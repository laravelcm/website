<?php
/**
 * @copyright Copyright (c) 2018. MckenzieArts
 * @author    Mckenziearts <monneylobe@gmail.com>
 * @link      https://github.com/Mckenziearts/laravel-command
 */

namespace App\Repositories;

use TCG\Voyager\Models\Category;

class CategoryRepository
{
    /**
     * @var Category
     */
    private $model;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * Return a new instance of Category Model
     *
     * @return Category
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
     * Get all categories by type give in param
     *
     * @param string $type
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function categoryType(string $type)
    {
        return $this->model
            ->newQuery()
            ->where('type', $type)
            ->orderBy('created_at', 'DESC')
            ->get();
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
            ->where('slug', $slug)
            ->firstOrFail();
    }
}
