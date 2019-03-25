<?php

namespace App\Repositories;

use TypiCMS\Modules\Users\Models\User;

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
     * Update user profile
     *
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(array $data, $id)
    {
        $model = $this->find($id);

        $model->first_name       = $data['first_name'] ?? '';
        $model->last_name        = $data['last_name'] ?? '';
        $model->email            = $data['email'] ?? '';
        //$model->twitter_profile  = $data['twitter_profile'] ?? '';
        //$model->github_profile   = $data['github_profile'] ?? '';

        return $model->save();
    }

    /**
     * Update password
     *
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function passwordUpdate(array $data, int $id)
    {
        $model = $this->find($id);

        return $model->update(['password' => bcrypt($data['password'])]);
    }
}
