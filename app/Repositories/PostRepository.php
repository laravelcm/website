<?php
/**
 * @copyright Copyright (c) 2018. MckenzieArts
 * @author    Mckenziearts <monneylobe@gmail.com>
 * @link      https://github.com/Mckenziearts/laravel-command
 */

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    /**
     * @var Post
     */
    private $model;

    /**
     * PostRepository constructor.
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    /**
     * Return a new instance of Post Model
     *
     * @return Post
     */
    public function newInstance()
    {
        return $this->model->newInstance();
    }

    /**
     * Get all book categories from the database
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->newQuery()->get();
    }

    /**
     * Get all book categories from the database
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function online()
    {
        return $this->model
            ->newQuery()
            ->where('status', '=', Post::PUBLISHED)
            ->get();
    }

    /**
     * Get last post from the database
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function last(int $limit = 3)
    {
        return $this->model->newQuery()
            ->with('authorId')
            ->where('status', '=', Post::PUBLISHED)
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get();
    }

    /**
     * Get all books categories by count pagination
     *
     * @param int $results
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(int $results = 10)
    {
        return $this->model->newQuery()
            ->with('authorId')
            ->where('status', '=', Post::PUBLISHED)
            ->orderBy('created_at', 'DESC')
            ->paginate($results);
    }

    /**
     * Return a model with the id set in parameter
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function find(int $id)
    {
        return $this->model->newQuery()
            ->findOrFail($id);
    }

    /**
     * Return a model with the slug set in parameter
     *
     * @param string $slug
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function findBySlug(string $slug)
    {
        return $this->model->newQuery()
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    /**
     * Return the previous post to the id set in param
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function prevPost(int $id)
    {
        return $this->model->newQuery()
            ->select('title', 'excerpt', 'slug')
            ->where('id', '<', $id)
            ->where('status', '=', Post::PUBLISHED)
            ->orderBy('id', 'DESC')
            ->first();
    }

    /**
     * Return the next post to the id set in param
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function nextPost(int $id)
    {
        return $this->model->newQuery()
            ->select('title', 'excerpt', 'slug')
            ->where('id', '>', $id)
            ->where('status', '=', Post::PUBLISHED)
            ->orderBy('id', 'ASC')
            ->first();
    }

    /**
     * Return search results
     *
     * @param string $query
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function search(string $query)
    {
        return $this->model
            ->scopeSearch($this->model->newQuery(), $query)
            ->select('title', 'excerpt', 'slug', 'image', 'created_at')
            ->where('status', '=', Post::PUBLISHED)
            ->get();
    }
}
