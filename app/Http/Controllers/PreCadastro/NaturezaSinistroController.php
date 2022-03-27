<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\NaturezaSinistroDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateNaturezaSinistroRequest;
use App\Http\Requests\PreCadastro\UpdateNaturezaSinistroRequest;
use App\Repositories\NaturezaSinistroRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NaturezaSinistroController extends AppBaseController
{
    /** @var NaturezaSinistroRepository $naturezaSinistroRepository*/
    private $naturezaSinistroRepository;

    public function __construct(NaturezaSinistroRepository $naturezaSinistroRepo)
    {
        $this->naturezaSinistroRepository = $naturezaSinistroRepo;
    }

    /**
     * Display a listing of the NaturezaSinistro.
     *
     * @param NaturezaSinistroDataTable $naturezaSinistroDataTable
     *
     * @return Response
     */
    public function index(NaturezaSinistroDataTable $naturezaSinistroDataTable)
    {
        return $naturezaSinistroDataTable->render('precadastro.natureza_sinistros.index');
    }

    /**
     * Show the form for creating a new NaturezaSinistro.
     *
     * @return Response
     */
    public function create()
    {
        return view('precadastro.natureza_sinistros.create');
    }

    /**
     * Store a newly created NaturezaSinistro in storage.
     *
     * @param CreateNaturezaSinistroRequest $request
     *
     * @return Response
     */
    public function store(CreateNaturezaSinistroRequest $request)
    {
        $input = $request->all();

        $naturezaSinistro = $this->naturezaSinistroRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/naturezaSinistros.singular')]));

        return redirect(route('precadastro.naturezaSinistros.index'));
    }

    /**
     * Display the specified NaturezaSinistro.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $naturezaSinistro = $this->naturezaSinistroRepository->find($id);

        if (empty($naturezaSinistro)) {
            Flash::error(__('messages.not_found', ['model' => __('models/naturezaSinistros.singular')]));

            return redirect(route('precadastro.naturezaSinistros.index'));
        }

        return view('precadastro.natureza_sinistros.show')->with('naturezaSinistro', $naturezaSinistro);
    }

    /**
     * Show the form for editing the specified NaturezaSinistro.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $naturezaSinistro = $this->naturezaSinistroRepository->find($id);

        if (empty($naturezaSinistro)) {
            Flash::error(__('messages.not_found', ['model' => __('models/naturezaSinistros.singular')]));

            return redirect(route('precadastro.naturezaSinistros.index'));
        }

        return view('precadastro.natureza_sinistros.edit')->with('naturezaSinistro', $naturezaSinistro);
    }

    /**
     * Update the specified NaturezaSinistro in storage.
     *
     * @param int $id
     * @param UpdateNaturezaSinistroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNaturezaSinistroRequest $request)
    {
        $naturezaSinistro = $this->naturezaSinistroRepository->find($id);

        if (empty($naturezaSinistro)) {
            Flash::error(__('messages.not_found', ['model' => __('models/naturezaSinistros.singular')]));

            return redirect(route('precadastro.naturezaSinistros.index'));
        }

        $naturezaSinistro = $this->naturezaSinistroRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/naturezaSinistros.singular')]));

        return redirect(route('precadastro.naturezaSinistros.index'));
    }

    /**
     * Remove the specified NaturezaSinistro from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $naturezaSinistro = $this->naturezaSinistroRepository->find($id);

        if (empty($naturezaSinistro)) {
            Flash::error(__('messages.not_found', ['model' => __('models/naturezaSinistros.singular')]));

            return redirect(route('precadastro.naturezaSinistros.index'));
        }

        $this->naturezaSinistroRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/naturezaSinistros.singular')]));

        return redirect(route('precadastro.naturezaSinistros.index'));
    }
}
