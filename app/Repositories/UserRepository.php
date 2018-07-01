<?php
/**
 * @copyright Copyright (c) 2018. MckenzieArts
 * @author    Mckenziearts <monneylobe@gmail.com>
 * @link      https://github.com/Mckenziearts/laravel-command
 */

namespace App\Repositories;

use App\User;

class UserRepository
{
    /**
     * @var User
     */
    private $model;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Return a new instance of User Model
     *
     * @return User
     */
    public function newInstance()
    {
        return $this->model->newInstance();
    }
}
