<?php

namespace Modules\User\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Modules\User\Repositories\UserRepository;
use Modules\User\Transformers\UsersResource;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return UsersResource
     */
    public function index()
    {
        return new UsersResource($this->userRepository->all());
    }
}
