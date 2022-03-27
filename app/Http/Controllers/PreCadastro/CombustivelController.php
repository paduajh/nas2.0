<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\CombustivelDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateCombustivelRequest;
use App\Http\Requests\PreCadastro\UpdateCombustivelRequest;
use App\Repositories\CombustivelRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CombustivelController extends AppBaseController
{
    /** @var CombustivelRepository $combustivelRepository*/
    private $combustivelRepository;

    public function __construct(CombustivelRepository $combustivelRepo)
    {
        $this->combustivelRepository = $combustivelRepo;
    }

    /**
     * Display a listing of the Combustivel.
     *
     * @param CombustivelDataTable $combustivelDataTable
     *
     * @return Response
     */
    public function index(CombustivelDataTable $combustivelDataTable)
    {
        return $combustivelDataTable->render('precadastro.combustivels.index');
    }

    /**
     * Show the form for creating a new Combustivel.
     *
     * @return Response
     */
    public function create()
    {
        return view('precadastro.combustivels.create');
    }

    /**
     * Store a newly created Combustivel in storage.
     *
     * @param CreateCombustivelRequest $request
     *
     * @return Response
     */
    public function store(CreateCombustivelRequest $request)
    {
        $input = $request->all();

        $combustivel = $this->combustivelRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/combustivels.singular')]));

        return redirect(route('precadastro.combustivels.index'));
    }

    /**
     * Display the specified Combustivel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $combustivel = $this->combustivelRepository->find($id);

        if (empty($combustivel)) {
            Flash::error(__('messages.not_found', ['model' => __('models/combustivels.singular')]));

            return redirect(route('precadastro.combustivels.index'));
        }

        return view('precadastro.combustivels.show')->with('combustivel', $combustivel);
    }

    /**
     * Show the form for editing the specified Combustivel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $combustivel = $this->combustivelRepository->find($id);

        if (empty($combustivel)) {
            Flash::error(__('messages.not_found', ['model' => __('models/combustivels.singular')]));

            return redirect(route('precadastro.combustivels.index'));
        }

        return view('precadastro.combustivels.edit')->with('combustivel', $combustivel);
    }

    /**
     * Update the specified Combustivel in storage.
     *
     * @param int $id
     * @param UpdateCombustivelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCombustivelRequest $request)
    {
        $combustivel = $this->combustivelRepository->find($id);

        if (empty($combustivel)) {
            Flash::error(__('messages.not_found', ['model' => __('models/combustivels.singular')]));

            return redirect(route('precadastro.combustivels.index'));
        }

        $combustivel = $this->combustivelRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/combustivels.singular')]));

        return redirect(route('precadastro.combustivels.index'));
    }

    /**
     * Remove the specified Combustivel from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $combustivel = $this->combustivelRepository->find($id);

        if (empty($combustivel)) {
            Flash::error(__('messages.not_found', ['model' => __('models/combustivels.singular')]));

            return redirect(route('precadastro.combustivels.index'));
        }

        $this->combustivelRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/combustivels.singular')]));

        return redirect(route('precadastro.combustivels.index'));
    }
}
