<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Http\Requests\PostRequest;
use Modules\Blog\Repositories\PostRepository;
use Modules\Core\Http\Controllers\Frontend\FrontendBaseController;

class ProposeController extends FrontendBaseController
{
    /**
     * @var PostRepository
     */
    protected PostRepository $postRepository;

    /**
     * BlogController constructor.
     *
     * @param  PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     * @throws \Modules\Core\Exceptions\GeneralException
     */
    public function propose()
    {
        $categories = Category::all('name', 'id');
        $isCreated = true;
        $post = $this->postRepository->makeModel();

        return Inertia::render('blog/Propose', [
            'categories' => $categories,
            'isCreated' => $isCreated,
            'post' => $post
        ]);
    }

    /**
     * Store a newly created resource in database.
     *
     * @param  PostRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $this->postRepository->create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'status' => Post::STATUS_PENDING,
            'user_id' => auth()->id(),
            'proposed_by' => auth()->id(),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()
            ->route('frontend.user.publishing')
            ->with('success', "Votre article a été soumis avec succès!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $response = $this->authorize('update', $this->postRepository->getById($id));

        if ($response->denied()) {
            abort('403', $response->message());
        }

        $post = $this->postRepository->getById($id);
        $categories = Category::all('name', 'id');
        $isCreated = false;

        return Inertia::render('blog/Propose', [
            'post' => $post,
            'categories' => $categories,
            'isCreated' => $isCreated
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, $id)
    {
        $response = $this->authorize('update', $this->postRepository->getById($id));

        if ($response->denied()) {
            abort('403', $response->message());
        }

        $this->postRepository->updateById($id, [
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => auth()->id(),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()
            ->route('frontend.user.publishing')
            ->with('success', "L'article a été modifié avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->postRepository->deleteById($id);

        return redirect()
            ->route('frontend.user.publishing')
            ->with('success', "L'article a été supprimé avec succès!");
    }
}
