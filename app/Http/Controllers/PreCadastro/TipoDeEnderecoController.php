<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\TipoDeEnderecoDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateTipoDeEnderecoRequest;
use App\Http\Requests\PreCadastro\UpdateTipoDeEnderecoRequest;
use App\Repositories\TipoDeEnderecoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Traits\Authorizable;
use Response;

class TipoDeEnderecoController extends AppBaseController
{
    use Authorizable;
    /** @var TipoDeEnderecoRepository $tipoDeEnderecoRepository*/
    private $tipoDeEnderecoRepository;

    public function __construct(TipoDeEnderecoRepository $tipoDeEnderecoRepo)
    {
        $this->authorize = 'tipodeendereco';
        $this->tipoDeEnderecoRepository = $tipoDeEnderecoRepo;
    }

    /**
     * Display a listing of the TipoDeEndereco.
     *
     * @param TipoDeEnderecoDataTable $tipoDeEnderecoDataTable
     *
     * @return Response
     */
    public function index(TipoDeEnderecoDataTable $tipoDeEnderecoDataTable)
    {
        return $tipoDeEnderecoDataTable->render('precadastro.tipo_de_enderecos.index');
    }

    /**
     * Show the form for creating a new TipoDeEndereco.
     *
     * @return Response
     */
    public function create()
    {
        return view('precadastro.tipo_de_enderecos.create');
    }

    /**
     * Store a newly created TipoDeEndereco in storage.
     *
     * @param CreateTipoDeEnderecoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoDeEnderecoRequest $request)
    {
        $input = $request->all();

        $tipoDeEndereco = $this->tipoDeEnderecoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tipoDeEnderecos.singular')]));

        return redirect(route('precadastro.tipoDeEnderecos.index'));
    }

    /**
     * Display the specified TipoDeEndereco.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoDeEndereco = $this->tipoDeEnderecoRepository->find($id);

        if (empty($tipoDeEndereco)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipoDeEnderecos.singular')]));

            return redirect(route('precadastro.tipoDeEnderecos.index'));
        }

        return view('precadastro.tipo_de_enderecos.show')->with('tipoDeEndereco', $tipoDeEndereco);
    }

    /**
     * Show the form for editing the specified TipoDeEndereco.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoDeEndereco = $this->tipoDeEnderecoRepository->find($id);

        if (empty($tipoDeEndereco)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipoDeEnderecos.singular')]));

            return redirect(route('precadastro.tipoDeEnderecos.index'));
        }

        return view('precadastro.tipo_de_enderecos.edit')->with('tipoDeEndereco', $tipoDeEndereco);
    }

    /**
     * Update the specified TipoDeEndereco in storage.
     *
     * @param int $id
     * @param UpdateTipoDeEnderecoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoDeEnderecoRequest $request)
    {
        $tipoDeEndereco = $this->tipoDeEnderecoRepository->find($id);

        if (empty($tipoDeEndereco)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipoDeEnderecos.singular')]));

            return redirect(route('precadastro.tipoDeEnderecos.index'));
        }

        $tipoDeEndereco = $this->tipoDeEnderecoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tipoDeEnderecos.singular')]));

        return redirect(route('precadastro.tipoDeEnderecos.index'));
    }

    /**
     * Remove the specified TipoDeEndereco from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoDeEndereco = $this->tipoDeEnderecoRepository->find($id);

        if (empty($tipoDeEndereco)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipoDeEnderecos.singular')]));

            return redirect(route('precadastro.tipoDeEnderecos.index'));
        }

        $this->tipoDeEnderecoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tipoDeEnderecos.singular')]));

        return redirect(route('precadastro.tipoDeEnderecos.index'));
    }
}
