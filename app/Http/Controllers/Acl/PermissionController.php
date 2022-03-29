<?php

namespace App\Http\Controllers\Acl;

use App\DataTables\Acl\PermissionDataTable;
use App\Http\Requests\Acl;
use App\Http\Requests\Acl\CreatePermissionRequest;
use App\Http\Requests\Acl\UpdatePermissionRequest;
use App\Repositories\PermissionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Traits\Authorizable;
use Response;

class PermissionController extends AppBaseController
{
    use Authorizable;
    /** @var PermissionRepository $permissionRepository*/
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->authorize = 'permission';
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * Display a listing of the Permission.
     *
     * @param PermissionDataTable $permissionDataTable
     *
     * @return Response
     */
    public function index(PermissionDataTable $permissionDataTable)
    {
        return $permissionDataTable->render('acl.permissions.index');
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return Response
     */
    public function create()
    {
        return view('acl.permissions.create');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request)
    {
        $input = $request->all();

        $permission = $this->permissionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/permissions.singular')]));

        return redirect(route('acl.permissions.index'));
    }

    /**
     * Display the specified Permission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissions.singular')]));

            return redirect(route('acl.permissions.index'));
        }

        return view('acl.permissions.show')->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissions.singular')]));

            return redirect(route('acl.permissions.index'));
        }

        return view('acl.permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param int $id
     * @param UpdatePermissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionRequest $request)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissions.singular')]));

            return redirect(route('acl.permissions.index'));
        }

        $permission = $this->permissionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/permissions.singular')]));

        return redirect(route('acl.permissions.index'));
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissions.singular')]));

            return redirect(route('acl.permissions.index'));
        }

        $this->permissionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/permissions.singular')]));

        return redirect(route('acl.permissions.index'));
    }
}
