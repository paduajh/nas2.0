<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\ContaDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateContaRequest;
use App\Http\Requests\PreCadastro\UpdateContaRequest;
use App\Repositories\ContaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Traits\Authorizable;
use Response;

class ContaController extends AppBaseController
{
    use Authorizable;
    /** @var ContaRepository $contaRepository*/
    private $contaRepository;

    public function __construct(ContaRepository $contaRepo)
    {
        $this->authorize = 'conta';
        $this->contaRepository = $contaRepo;
    }

    /**
     * Display a listing of the Conta.
     *
     * @param ContaDataTable $contaDataTable
     *
     * @return Response
     */
    public function index(ContaDataTable $contaDataTable)
    {
        return $contaDataTable->render('precadastro.contas.index');
    }

    /**
     * Show the form for creating a new Conta.
     *
     * @return Response
     */
    public function create()
    {
        $tiposConta = ['Conta_Bancaria' => 'Conta Bancaria', 'Conta_Caixa' => 'Conta Caixa'];
        return view('precadastro.contas.create',compact('tiposConta'));
    }

    /**
     * Store a newly created Conta in storage.
     *
     * @param CreateContaRequest $request
     *
     * @return Response
     */
    public function store(CreateContaRequest $request)
    {
        $input = $request->all();

        $conta = $this->contaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/contas.singular')]));

        return redirect(route('precadastro.contas.index'));
    }

    /**
     * Display the specified Conta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $conta = $this->contaRepository->find($id);

        if (empty($conta)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contas.singular')]));

            return redirect(route('precadastro.contas.index'));
        }

        return view('precadastro.contas.show')->with('conta', $conta);
    }

    /**
     * Show the form for editing the specified Conta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $conta = $this->contaRepository->find($id);
        $tiposConta = ['Conta_Bancaria' => 'Conta Bancaria', 'Conta_Caixa' => 'Conta Caixa'];
        if (empty($conta)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contas.singular')]));

            return redirect(route('precadastro.contas.index'));
        }

        return view('precadastro.contas.edit',compact('tiposConta'))->with('conta', $conta);
    }

    /**
     * Update the specified Conta in storage.
     *
     * @param int $id
     * @param UpdateContaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContaRequest $request)
    {
        $conta = $this->contaRepository->find($id);

        if (empty($conta)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contas.singular')]));

            return redirect(route('precadastro.contas.index'));
        }

        $conta = $this->contaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/contas.singular')]));

        return redirect(route('precadastro.contas.index'));
    }

    /**
     * Remove the specified Conta from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $conta = $this->contaRepository->find($id);

        if (empty($conta)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contas.singular')]));

            return redirect(route('precadastro.contas.index'));
        }

        $this->contaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/contas.singular')]));

        return redirect(route('precadastro.contas.index'));
    }
}
