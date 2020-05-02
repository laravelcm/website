<?php

namespace Modules\User\Http\Controllers\Backend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Entities\Role;
use Modules\User\Events\Role\RoleDeleted;
use Modules\User\Http\Requests\ManageRoleRequest;
use Modules\User\Http\Requests\StoreRoleRequest;
use Modules\User\Http\Requests\UpdateRoleRequest;
use Modules\User\Repositories\PermissionRepository;
use Modules\User\Repositories\RoleRepository;

class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * RoleController constructor.
     *
     * @param RoleRepository $roleRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManageRoleRequest $request
     * @return Response
     */
    public function index(ManageRoleRequest $request)
    {
        return view('user::backend.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageRoleRequest $request
     * @return Response
     */
    public function create(ManageRoleRequest $request)
    {
        return view('user::backend.role.create')
            ->withPermissions($this->permissionRepository->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleRequest $request
     * @return Response
     * @throws \Modules\Core\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roleRepository->create($request->only('name', 'display_name', 'permissions', 'description'));

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('user::alerts.backend.roles.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManageRoleRequest $request
     * @param Role $role
     * @return Response
     */
    public function edit(ManageRoleRequest $request, Role $role)
    {
        if ($role->isAdmin()) {
            return redirect()->route('admin.auth.role.index')->withFlashDanger('You can not edit the administrator role.');
        }

        return view('user::backend.role.edit')
            ->withRole($role)
            ->withRolePermissions($role->permissions->pluck('name')->all())
            ->withPermissions($this->permissionRepository->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return mixed
     * @throws \Modules\Core\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->roleRepository->update($role, $request->only('name', 'display_name', 'permissions', 'description'));

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('user::alerts.backend.roles.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManageRoleRequest $request
     * @param Role $role
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageRoleRequest $request, Role $role)
    {
        if ($role->isAdmin()) {
            return redirect()->route('admin.auth.role.index')->withFlashDanger(__('exceptions.backend.access.roles.cant_delete_admin'));
        }

        $this->roleRepository->deleteById($role->id);

        event(new RoleDeleted($role));

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('alerts.backend.roles.deleted'));
    }

    /**
     * Remove all enterprises.
     *
     * @param ManageRoleRequest $request
     * @return Response
     */
    public function deleteAll(ManageRoleRequest $request)
    {
        $ids = explode(',', $request->input('ids'));

        if (in_array(1, $ids)) {
            return redirect()->route('admin.auth.role.index')->withFlashDanger(__('exceptions.backend.access.roles.cant_delete_admin'));
        }

        $this->roleRepository->deleteMultipleById($ids);

        return redirect()->route('admin.auth.role.index')
            ->withFlashSuccess(__('user::alerts.backend.roles.deleted_all'));
    }
}
