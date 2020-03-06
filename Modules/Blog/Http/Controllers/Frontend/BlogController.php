<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('blog/Index');
    }

    /**
     * Display a category listing posts.
     *
     * @param  Category $category
     * @return \Inertia\Response
     */
    public function category(Category $category)
    {
        return Inertia::render('blog/Category', [
            'category' => $category
        ]);
    }

    /**
     * Display s single Post
     *
     * @param  Post $post
     * @return \Inertia\Response
     */
    public function post(Post $post)
    {
        // $post->increment('visits');

        return Inertia::render('blog/Post', [
            'post' => $post
        ]);
    }
}
