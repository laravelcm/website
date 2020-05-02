<?php

namespace Modules\User\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Transformers\RolesResource;

class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * RoleController constructor.
     *
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return RolesResource
     */
    public function index()
    {
        return new RolesResource($this->roleRepository
            ->withCount('users')
            ->orderBy('created_at', 'desc')
            ->get());
    }
}
