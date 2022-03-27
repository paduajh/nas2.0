<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\CentroCustoDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateCentroCustoRequest;
use App\Http\Requests\PreCadastro\UpdateCentroCustoRequest;
use App\Repositories\CentroCustoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CentroCustoController extends AppBaseController
{
    /** @var CentroCustoRepository $centroCustoRepository*/
    private $centroCustoRepository;

    public function __construct(CentroCustoRepository $centroCustoRepo)
    {
        $this->centroCustoRepository = $centroCustoRepo;
    }

    /**
     * Display a listing of the CentroCusto.
     *
     * @param CentroCustoDataTable $centroCustoDataTable
     *
     * @return Response
     */
    public function index(CentroCustoDataTable $centroCustoDataTable)
    {
        return $centroCustoDataTable->render('precadastro.centro_custos.index');
    }

    /**
     * Show the form for creating a new CentroCusto.
     *
     * @return Response
     */
    public function create()
    {
        return view('precadastro.centro_custos.create');
    }

    /**
     * Store a newly created CentroCusto in storage.
     *
     * @param CreateCentroCustoRequest $request
     *
     * @return Response
     */
    public function store(CreateCentroCustoRequest $request)
    {
        $input = $request->all();

        $centroCusto = $this->centroCustoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/centroCustos.singular')]));

        return redirect(route('precadastro.centroCustos.index'));
    }

    /**
     * Display the specified CentroCusto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $centroCusto = $this->centroCustoRepository->find($id);

        if (empty($centroCusto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/centroCustos.singular')]));

            return redirect(route('precadastro.centroCustos.index'));
        }

        return view('precadastro.centro_custos.show')->with('centroCusto', $centroCusto);
    }

    /**
     * Show the form for editing the specified CentroCusto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $centroCusto = $this->centroCustoRepository->find($id);

        if (empty($centroCusto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/centroCustos.singular')]));

            return redirect(route('precadastro.centroCustos.index'));
        }

        return view('precadastro.centro_custos.edit')->with('centroCusto', $centroCusto);
    }

    /**
     * Update the specified CentroCusto in storage.
     *
     * @param int $id
     * @param UpdateCentroCustoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCentroCustoRequest $request)
    {
        $centroCusto = $this->centroCustoRepository->find($id);

        if (empty($centroCusto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/centroCustos.singular')]));

            return redirect(route('precadastro.centroCustos.index'));
        }

        $centroCusto = $this->centroCustoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/centroCustos.singular')]));

        return redirect(route('precadastro.centroCustos.index'));
    }

    /**
     * Remove the specified CentroCusto from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $centroCusto = $this->centroCustoRepository->find($id);

        if (empty($centroCusto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/centroCustos.singular')]));

            return redirect(route('precadastro.centroCustos.index'));
        }

        $this->centroCustoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/centroCustos.singular')]));

        return redirect(route('precadastro.centroCustos.index'));
    }
}
