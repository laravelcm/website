<?php

namespace Modules\Blog\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Transformers\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CategoryResource
     */
    public function index()
    {
        return new CategoryResource(Category::all());
    }
}
