<?php

namespace App\Http\Controllers\Acl;

use Flash;
use Response;
use App\Http\Requests\Acl;
use App\Models\Acl\Permission;
use App\Repositories\RoleRepository;
use App\DataTables\Acl\RoleDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Acl\CreateRoleRequest;
use App\Http\Requests\Acl\UpdateRoleRequest;
use App\Traits\Authorizable;

class RoleController extends AppBaseController
{
    use Authorizable;
    /** @var RoleRepository $roleRepository*/
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->authorize = 'role';
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param RoleDataTable $roleDataTable
     *
     * @return Response
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('acl.roles.index');
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        $permissoes = Permission::all()->pluck('name','id');
        return view('acl.roles.create',compact('permissoes'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->create($input);
        $permissions = $request->input('permissoes', []);
        $role->syncPermissions($permissions);
        Flash::success(__('messages.saved', ['model' => __('models/roles.singular')]));

        return redirect(route('acl.roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roles.singular')]));

            return redirect(route('acl.roles.index'));
        }

        return view('acl.roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roles.singular')]));

            return redirect(route('acl.roles.index'));
        }
        $permissoes = Permission::all()->pluck('name','id');
        $permissionSelected = $role->permissions->pluck('id');
        return view('acl.roles.edit',compact('permissoes','permissionSelected'))->with('role', $role);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param int $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roles.singular')]));

            return redirect(route('acl.roles.index'));
        }

        $role = $this->roleRepository->update($request->all(), $id);
        $permissions = $request->input('permissoes', []);
        $role->syncPermissions($permissions);
        Flash::success(__('messages.updated', ['model' => __('models/roles.singular')]));

        return redirect(route('acl.roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roles.singular')]));

            return redirect(route('acl.roles.index'));
        }

        $this->roleRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/roles.singular')]));

        return redirect(route('acl.roles.index'));
    }
}
