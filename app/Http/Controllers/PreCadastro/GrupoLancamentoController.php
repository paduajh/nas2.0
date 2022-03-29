<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\GrupoLancamentoDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateGrupoLancamentoRequest;
use App\Http\Requests\PreCadastro\UpdateGrupoLancamentoRequest;
use App\Repositories\GrupoLancamentoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Traits\Authorizable;
use Response;

class GrupoLancamentoController extends AppBaseController
{
    use Authorizable;
    /** @var GrupoLancamentoRepository $grupoLancamentoRepository*/
    private $grupoLancamentoRepository;

    public function __construct(GrupoLancamentoRepository $grupoLancamentoRepo)
    {
        $this->authorize = 'grupolancamento';
        $this->grupoLancamentoRepository = $grupoLancamentoRepo;
    }

    /**
     * Display a listing of the GrupoLancamento.
     *
     * @param GrupoLancamentoDataTable $grupoLancamentoDataTable
     *
     * @return Response
     */
    public function index(GrupoLancamentoDataTable $grupoLancamentoDataTable)
    {
        return $grupoLancamentoDataTable->render('precadastro.grupo_lancamentos.index');
    }

    /**
     * Show the form for creating a new GrupoLancamento.
     *
     * @return Response
     */
    public function create()
    {
        return view('precadastro.grupo_lancamentos.create');
    }

    /**
     * Store a newly created GrupoLancamento in storage.
     *
     * @param CreateGrupoLancamentoRequest $request
     *
     * @return Response
     */
    public function store(CreateGrupoLancamentoRequest $request)
    {
        $input = $request->all();

        $grupoLancamento = $this->grupoLancamentoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/grupoLancamentos.singular')]));

        return redirect(route('precadastro.grupoLancamentos.index'));
    }

    /**
     * Display the specified GrupoLancamento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grupoLancamento = $this->grupoLancamentoRepository->find($id);

        if (empty($grupoLancamento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/grupoLancamentos.singular')]));

            return redirect(route('precadastro.grupoLancamentos.index'));
        }

        return view('precadastro.grupo_lancamentos.show')->with('grupoLancamento', $grupoLancamento);
    }

    /**
     * Show the form for editing the specified GrupoLancamento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grupoLancamento = $this->grupoLancamentoRepository->find($id);

        if (empty($grupoLancamento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/grupoLancamentos.singular')]));

            return redirect(route('precadastro.grupoLancamentos.index'));
        }

        return view('precadastro.grupo_lancamentos.edit')->with('grupoLancamento', $grupoLancamento);
    }

    /**
     * Update the specified GrupoLancamento in storage.
     *
     * @param int $id
     * @param UpdateGrupoLancamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrupoLancamentoRequest $request)
    {
        $grupoLancamento = $this->grupoLancamentoRepository->find($id);

        if (empty($grupoLancamento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/grupoLancamentos.singular')]));

            return redirect(route('precadastro.grupoLancamentos.index'));
        }

        $grupoLancamento = $this->grupoLancamentoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/grupoLancamentos.singular')]));

        return redirect(route('precadastro.grupoLancamentos.index'));
    }

    /**
     * Remove the specified GrupoLancamento from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grupoLancamento = $this->grupoLancamentoRepository->find($id);

        if (empty($grupoLancamento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/grupoLancamentos.singular')]));

            return redirect(route('precadastro.grupoLancamentos.index'));
        }

        $this->grupoLancamentoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/grupoLancamentos.singular')]));

        return redirect(route('precadastro.grupoLancamentos.index'));
    }
}
