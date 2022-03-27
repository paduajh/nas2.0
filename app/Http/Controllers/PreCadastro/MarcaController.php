<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\MarcaDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateMarcaRequest;
use App\Http\Requests\PreCadastro\UpdateMarcaRequest;
use App\Repositories\MarcaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MarcaController extends AppBaseController
{
    /** @var MarcaRepository $marcaRepository*/
    private $marcaRepository;

    public function __construct(MarcaRepository $marcaRepo)
    {
        $this->marcaRepository = $marcaRepo;
    }

    /**
     * Display a listing of the Marca.
     *
     * @param MarcaDataTable $marcaDataTable
     *
     * @return Response
     */
    public function index(MarcaDataTable $marcaDataTable)
    {
        return $marcaDataTable->render('precadastro.marcas.index');
    }

    /**
     * Show the form for creating a new Marca.
     *
     * @return Response
     */
    public function create()
    {
        return view('precadastro.marcas.create');
    }

    /**
     * Store a newly created Marca in storage.
     *
     * @param CreateMarcaRequest $request
     *
     * @return Response
     */
    public function store(CreateMarcaRequest $request)
    {
        $input = $request->all();

        $marca = $this->marcaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/marcas.singular')]));

        return redirect(route('precadastro.marcas.index'));
    }

    /**
     * Display the specified Marca.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $marca = $this->marcaRepository->find($id);

        if (empty($marca)) {
            Flash::error(__('messages.not_found', ['model' => __('models/marcas.singular')]));

            return redirect(route('precadastro.marcas.index'));
        }

        return view('precadastro.marcas.show')->with('marca', $marca);
    }

    /**
     * Show the form for editing the specified Marca.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $marca = $this->marcaRepository->find($id);

        if (empty($marca)) {
            Flash::error(__('messages.not_found', ['model' => __('models/marcas.singular')]));

            return redirect(route('precadastro.marcas.index'));
        }

        return view('precadastro.marcas.edit')->with('marca', $marca);
    }

    /**
     * Update the specified Marca in storage.
     *
     * @param int $id
     * @param UpdateMarcaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarcaRequest $request)
    {
        $marca = $this->marcaRepository->find($id);

        if (empty($marca)) {
            Flash::error(__('messages.not_found', ['model' => __('models/marcas.singular')]));

            return redirect(route('precadastro.marcas.index'));
        }

        $marca = $this->marcaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/marcas.singular')]));

        return redirect(route('precadastro.marcas.index'));
    }

    /**
     * Remove the specified Marca from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $marca = $this->marcaRepository->find($id);

        if (empty($marca)) {
            Flash::error(__('messages.not_found', ['model' => __('models/marcas.singular')]));

            return redirect(route('precadastro.marcas.index'));
        }

        $this->marcaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/marcas.singular')]));

        return redirect(route('precadastro.marcas.index'));
    }
}
