<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Repositories\PostRepository;
use Modules\Forum\Repositories\ThreadRepository;
use Spatie\Searchable\ModelSearchAspect;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    /**
     * @var ThreadRepository
     */
    protected ThreadRepository $threadRepository;

    /**
     * @var PostRepository
     */
    protected PostRepository $postRepository;

    public function __construct(ThreadRepository $threadRepository, PostRepository $postRepository)
    {
        $this->threadRepository = $threadRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Return search results.
     *
     * @param  Request  $request
     * @return \Spatie\Searchable\SearchResultCollection
     */
    public function search(Request $request)
    {
        $results = (new Search())
            ->registerModel($this->postRepository->model(), function (ModelSearchAspect $modelSearchAspect) {
                $modelSearchAspect
                    ->addSearchableAttribute('title')
                    ->addSearchableAttribute('body')
                    ->publish();
            })
            ->registerModel($this->threadRepository->model(), ['title', 'body'])
            ->search($request->get('search'));

        return $results;
    }
}
