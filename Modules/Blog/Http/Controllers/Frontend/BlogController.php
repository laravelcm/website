<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Repositories\PostRepository;

class BlogController extends Controller
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
     */
    public function index()
    {
        $posts = Post::publish()
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        return Inertia::render('blog/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * Display a category listing posts.
     *
     * @param  string $slug
     * @return \Inertia\Response
     */
    public function category(string $slug)
    {
        $category = Category::with('posts')->where('slug', $slug)->firstOrFail();
        $posts = $category->posts()
            ->publish()
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        return Inertia::render('blog/Category', [
            'category' => $category,
            'posts' => $posts
        ]);
    }

    /**
     * Display s single Post
     *
     * @param  string $slug
     * @return \Inertia\Response
     */
    public function post(string $slug)
    {
        $post = $this->postRepository->getByColumn($slug, 'slug');

        if(!$post) {
            abort('404', "L'article que vous demandé n'est plus disponible ou a été supprimé.");
        }

        $post->increment('visits');

        return Inertia::render('blog/Post', [
            'post' => $post
        ]);
    }
}
