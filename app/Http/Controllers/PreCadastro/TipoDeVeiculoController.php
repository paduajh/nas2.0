<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\TipoDeVeiculoDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateTipoDeVeiculoRequest;
use App\Http\Requests\PreCadastro\UpdateTipoDeVeiculoRequest;
use App\Repositories\TipoDeVeiculoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Traits\Authorizable;
use Response;

class TipoDeVeiculoController extends AppBaseController
{
    use Authorizable;
    /** @var TipoDeVeiculoRepository $tipoDeVeiculoRepository*/
    private $tipoDeVeiculoRepository;

    public function __construct(TipoDeVeiculoRepository $tipoDeVeiculoRepo)
    {
        $this->authorize = 'tipodeveiculo';
        $this->tipoDeVeiculoRepository = $tipoDeVeiculoRepo;
    }

    /**
     * Display a listing of the TipoDeVeiculo.
     *
     * @param TipoDeVeiculoDataTable $tipoDeVeiculoDataTable
     *
     * @return Response
     */
    public function index(TipoDeVeiculoDataTable $tipoDeVeiculoDataTable)
    {
        return $tipoDeVeiculoDataTable->render('precadastro.tipo_de_veiculos.index');
    }

    /**
     * Show the form for creating a new TipoDeVeiculo.
     *
     * @return Response
     */
    public function create()
    {
        return view('precadastro.tipo_de_veiculos.create');
    }

    /**
     * Store a newly created TipoDeVeiculo in storage.
     *
     * @param CreateTipoDeVeiculoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoDeVeiculoRequest $request)
    {
        $input = $request->all();

        $tipoDeVeiculo = $this->tipoDeVeiculoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tipoDeVeiculos.singular')]));

        return redirect(route('precadastro.tipoDeVeiculos.index'));
    }

    /**
     * Display the specified TipoDeVeiculo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoDeVeiculo = $this->tipoDeVeiculoRepository->find($id);

        if (empty($tipoDeVeiculo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipoDeVeiculos.singular')]));

            return redirect(route('precadastro.tipoDeVeiculos.index'));
        }

        return view('precadastro.tipo_de_veiculos.show')->with('tipoDeVeiculo', $tipoDeVeiculo);
    }

    /**
     * Show the form for editing the specified TipoDeVeiculo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoDeVeiculo = $this->tipoDeVeiculoRepository->find($id);

        if (empty($tipoDeVeiculo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipoDeVeiculos.singular')]));

            return redirect(route('precadastro.tipoDeVeiculos.index'));
        }

        return view('precadastro.tipo_de_veiculos.edit')->with('tipoDeVeiculo', $tipoDeVeiculo);
    }

    /**
     * Update the specified TipoDeVeiculo in storage.
     *
     * @param int $id
     * @param UpdateTipoDeVeiculoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoDeVeiculoRequest $request)
    {
        $tipoDeVeiculo = $this->tipoDeVeiculoRepository->find($id);

        if (empty($tipoDeVeiculo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipoDeVeiculos.singular')]));

            return redirect(route('precadastro.tipoDeVeiculos.index'));
        }

        $tipoDeVeiculo = $this->tipoDeVeiculoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tipoDeVeiculos.singular')]));

        return redirect(route('precadastro.tipoDeVeiculos.index'));
    }

    /**
     * Remove the specified TipoDeVeiculo from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoDeVeiculo = $this->tipoDeVeiculoRepository->find($id);

        if (empty($tipoDeVeiculo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipoDeVeiculos.singular')]));

            return redirect(route('precadastro.tipoDeVeiculos.index'));
        }

        $this->tipoDeVeiculoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tipoDeVeiculos.singular')]));

        return redirect(route('precadastro.tipoDeVeiculos.index'));
    }
}
