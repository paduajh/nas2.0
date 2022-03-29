<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\FormaPagamentoDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateFormaPagamentoRequest;
use App\Http\Requests\PreCadastro\UpdateFormaPagamentoRequest;
use App\Repositories\FormaPagamentoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Traits\Authorizable;
use Response;

class FormaPagamentoController extends AppBaseController
{
    use Authorizable;
    /** @var FormaPagamentoRepository $formaPagamentoRepository*/
    private $formaPagamentoRepository;

    public function __construct(FormaPagamentoRepository $formaPagamentoRepo)
    {
        $this->authorize = 'formapagamento';
        $this->formaPagamentoRepository = $formaPagamentoRepo;
    }

    /**
     * Display a listing of the FormaPagamento.
     *
     * @param FormaPagamentoDataTable $formaPagamentoDataTable
     *
     * @return Response
     */
    public function index(FormaPagamentoDataTable $formaPagamentoDataTable)
    {
        return $formaPagamentoDataTable->render('precadastro.forma_pagamentos.index');
    }

    /**
     * Show the form for creating a new FormaPagamento.
     *
     * @return Response
     */
    public function create()
    {
        return view('precadastro.forma_pagamentos.create');
    }

    /**
     * Store a newly created FormaPagamento in storage.
     *
     * @param CreateFormaPagamentoRequest $request
     *
     * @return Response
     */
    public function store(CreateFormaPagamentoRequest $request)
    {
        $input = $request->all();

        $formaPagamento = $this->formaPagamentoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/formaPagamentos.singular')]));

        return redirect(route('precadastro.formaPagamentos.index'));
    }

    /**
     * Display the specified FormaPagamento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formaPagamento = $this->formaPagamentoRepository->find($id);

        if (empty($formaPagamento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/formaPagamentos.singular')]));

            return redirect(route('precadastro.formaPagamentos.index'));
        }

        return view('precadastro.forma_pagamentos.show')->with('formaPagamento', $formaPagamento);
    }

    /**
     * Show the form for editing the specified FormaPagamento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formaPagamento = $this->formaPagamentoRepository->find($id);

        if (empty($formaPagamento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/formaPagamentos.singular')]));

            return redirect(route('precadastro.formaPagamentos.index'));
        }

        return view('precadastro.forma_pagamentos.edit')->with('formaPagamento', $formaPagamento);
    }

    /**
     * Update the specified FormaPagamento in storage.
     *
     * @param int $id
     * @param UpdateFormaPagamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormaPagamentoRequest $request)
    {
        $formaPagamento = $this->formaPagamentoRepository->find($id);

        if (empty($formaPagamento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/formaPagamentos.singular')]));

            return redirect(route('precadastro.formaPagamentos.index'));
        }

        $formaPagamento = $this->formaPagamentoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/formaPagamentos.singular')]));

        return redirect(route('precadastro.formaPagamentos.index'));
    }

    /**
     * Remove the specified FormaPagamento from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formaPagamento = $this->formaPagamentoRepository->find($id);

        if (empty($formaPagamento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/formaPagamentos.singular')]));

            return redirect(route('precadastro.formaPagamentos.index'));
        }

        $this->formaPagamentoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/formaPagamentos.singular')]));

        return redirect(route('precadastro.formaPagamentos.index'));
    }
}
