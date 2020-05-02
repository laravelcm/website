<?php

namespace Modules\User\Http\Controllers\Backend;

use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Backend\BackendBaseController;
use Modules\User\Events\User\UserDeleted;
use Modules\User\Http\Requests\ManageUserRequest;
use Modules\User\Http\Requests\StoreUserRequest;
use Modules\User\Http\Requests\UpdateUserRequest;
use Modules\User\Repositories\PermissionRepository;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Repositories\UserRepository;

class UserController extends BackendBaseController
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     * @param RoleRepository $roleRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(
        UserRepository $userRepository,
        RoleRepository $roleRepository,
        PermissionRepository $permissionRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManageUserRequest $request
     * @return Response
     */
    public function index(ManageUserRequest $request)
    {
        return view('user::backend.user.index')
            ->withUsers($this->userRepository->count());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user::backend.user.create')
            ->withRoles($this->roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($this->permissionRepository->get(['id', 'name']));;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return Response
     * @throws \Throwable
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->only(
            'first_name',
            'last_name',
            'email',
            'password',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('user::alerts.backend.users.created'));
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('user::backend.user.show')
            ->withUser($this->userRepository->getById($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id)
    {
        $user = $this->userRepository->getById($id);

        return view('user::backend.user.edit')
            ->withUser($user)
            ->withRoles($this->roleRepository->get())
            ->withPermissions($this->permissionRepository->get(['id', 'name']))
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withUserPermissions($user->permissions->pluck('name')->all());;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return Response
     * @throws \Modules\Core\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userRepository->getById($id);
        $this->userRepository->update($user, $request->only(
            'first_name',
            'last_name',
            'email',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.user.index')
            ->withFlashSuccess(__('user::alerts.backend.users.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManageUserRequest $request
     * @param int $id
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageUserRequest $request, int $id)
    {
        $user = $this->userRepository->getById($id);
        $this->userRepository->deleteById($user->id);

        event(new UserDeleted($user));

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__('alerts.backend.users.deleted'));
    }
}
