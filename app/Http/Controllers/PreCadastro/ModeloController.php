<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\ModeloDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateModeloRequest;
use App\Http\Requests\PreCadastro\UpdateModeloRequest;
use App\Repositories\ModeloRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ModeloController extends AppBaseController
{
    /** @var ModeloRepository $modeloRepository*/
    private $modeloRepository;

    public function __construct(ModeloRepository $modeloRepo)
    {
        $this->modeloRepository = $modeloRepo;
    }

    /**
     * Display a listing of the Modelo.
     *
     * @param ModeloDataTable $modeloDataTable
     *
     * @return Response
     */
    public function index(ModeloDataTable $modeloDataTable)
    {
        return $modeloDataTable->render('precadastro.modelos.index');
    }

    /**
     * Show the form for creating a new Modelo.
     *
     * @return Response
     */
    public function create()
    {
        return view('precadastro.modelos.create');
    }

    /**
     * Store a newly created Modelo in storage.
     *
     * @param CreateModeloRequest $request
     *
     * @return Response
     */
    public function store(CreateModeloRequest $request)
    {
        $input = $request->all();

        $modelo = $this->modeloRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/modelos.singular')]));

        return redirect(route('precadastro.modelos.index'));
    }

    /**
     * Display the specified Modelo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modelo = $this->modeloRepository->find($id);

        if (empty($modelo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modelos.singular')]));

            return redirect(route('precadastro.modelos.index'));
        }

        return view('precadastro.modelos.show')->with('modelo', $modelo);
    }

    /**
     * Show the form for editing the specified Modelo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modelo = $this->modeloRepository->find($id);

        if (empty($modelo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modelos.singular')]));

            return redirect(route('precadastro.modelos.index'));
        }

        return view('precadastro.modelos.edit')->with('modelo', $modelo);
    }

    /**
     * Update the specified Modelo in storage.
     *
     * @param int $id
     * @param UpdateModeloRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModeloRequest $request)
    {
        $modelo = $this->modeloRepository->find($id);

        if (empty($modelo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modelos.singular')]));

            return redirect(route('precadastro.modelos.index'));
        }

        $modelo = $this->modeloRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modelos.singular')]));

        return redirect(route('precadastro.modelos.index'));
    }

    /**
     * Remove the specified Modelo from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modelo = $this->modeloRepository->find($id);

        if (empty($modelo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modelos.singular')]));

            return redirect(route('precadastro.modelos.index'));
        }

        $this->modeloRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modelos.singular')]));

        return redirect(route('precadastro.modelos.index'));
    }
}
