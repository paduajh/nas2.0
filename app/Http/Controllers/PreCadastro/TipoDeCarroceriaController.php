<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\TipoDeCarroceriaDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateTipoDeCarroceriaRequest;
use App\Http\Requests\PreCadastro\UpdateTipoDeCarroceriaRequest;
use App\Repositories\TipoDeCarroceriaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Traits\Authorizable;
use Response;

class TipoDeCarroceriaController extends AppBaseController
{
    use Authorizable;
    /** @var TipoDeCarroceriaRepository $tipoDeCarroceriaRepository*/
    private $tipoDeCarroceriaRepository;

    public function __construct(TipoDeCarroceriaRepository $tipoDeCarroceriaRepo)
    {
        $this->authorize = 'tipodecarroceria';
        $this->tipoDeCarroceriaRepository = $tipoDeCarroceriaRepo;
    }

    /**
     * Display a listing of the TipoDeCarroceria.
     *
     * @param TipoDeCarroceriaDataTable $tipoDeCarroceriaDataTable
     *
     * @return Response
     */
    public function index(TipoDeCarroceriaDataTable $tipoDeCarroceriaDataTable)
    {
        return $tipoDeCarroceriaDataTable->render('precadastro.tipo_de_carrocerias.index');
    }

    /**
     * Show the form for creating a new TipoDeCarroceria.
     *
     * @return Response
     */
    public function create()
    {
        return view('precadastro.tipo_de_carrocerias.create');
    }

    /**
     * Store a newly created TipoDeCarroceria in storage.
     *
     * @param CreateTipoDeCarroceriaRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoDeCarroceriaRequest $request)
    {
        $input = $request->all();

        $tipoDeCarroceria = $this->tipoDeCarroceriaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tipoDeCarrocerias.singular')]));

        return redirect(route('precadastro.tipoDeCarrocerias.index'));
    }

    /**
     * Display the specified TipoDeCarroceria.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoDeCarroceria = $this->tipoDeCarroceriaRepository->find($id);

        if (empty($tipoDeCarroceria)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipoDeCarrocerias.singular')]));

            return redirect(route('precadastro.tipoDeCarrocerias.index'));
        }

        return view('precadastro.tipo_de_carrocerias.show')->with('tipoDeCarroceria', $tipoDeCarroceria);
    }

    /**
     * Show the form for editing the specified TipoDeCarroceria.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoDeCarroceria = $this->tipoDeCarroceriaRepository->find($id);

        if (empty($tipoDeCarroceria)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipoDeCarrocerias.singular')]));

            return redirect(route('precadastro.tipoDeCarrocerias.index'));
        }

        return view('precadastro.tipo_de_carrocerias.edit')->with('tipoDeCarroceria', $tipoDeCarroceria);
    }

    /**
     * Update the specified TipoDeCarroceria in storage.
     *
     * @param int $id
     * @param UpdateTipoDeCarroceriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoDeCarroceriaRequest $request)
    {
        $tipoDeCarroceria = $this->tipoDeCarroceriaRepository->find($id);

        if (empty($tipoDeCarroceria)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipoDeCarrocerias.singular')]));

            return redirect(route('precadastro.tipoDeCarrocerias.index'));
        }

        $tipoDeCarroceria = $this->tipoDeCarroceriaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tipoDeCarrocerias.singular')]));

        return redirect(route('precadastro.tipoDeCarrocerias.index'));
    }

    /**
     * Remove the specified TipoDeCarroceria from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoDeCarroceria = $this->tipoDeCarroceriaRepository->find($id);

        if (empty($tipoDeCarroceria)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipoDeCarrocerias.singular')]));

            return redirect(route('precadastro.tipoDeCarrocerias.index'));
        }

        $this->tipoDeCarroceriaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tipoDeCarrocerias.singular')]));

        return redirect(route('precadastro.tipoDeCarrocerias.index'));
    }
}
