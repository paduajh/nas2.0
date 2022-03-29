<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\CategoriaDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateCategoriaRequest;
use App\Http\Requests\PreCadastro\UpdateCategoriaRequest;
use App\Repositories\CategoriaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Traits\Authorizable;
use Response;

class CategoriaController extends AppBaseController
{
    use Authorizable;
    /** @var CategoriaRepository $categoriaRepository*/
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepo)
    {
        $this->authorize = 'categoria';
        $this->categoriaRepository = $categoriaRepo;
    }

    /**
     * Display a listing of the Categoria.
     *
     * @param CategoriaDataTable $categoriaDataTable
     *
     * @return Response
     */
    public function index(CategoriaDataTable $categoriaDataTable)
    {
        $this->checkPermission('list_categoria');
        return $categoriaDataTable->render('precadastro.categorias.index');
    }

    /**
     * Show the form for creating a new Categoria.
     *
     * @return Response
     */
    public function create()
    {
        $this->checkPermission('create_categoria');
        return view('precadastro.categorias.create');
    }

    /**
     * Store a newly created Categoria in storage.
     *
     * @param CreateCategoriaRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriaRequest $request)
    {
        $this->checkPermission('create_categoria');
        $input = $request->all();

        $categoria = $this->categoriaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/categorias.singular')]));

        return redirect(route('precadastro.categorias.index'));
    }

    /**
     * Display the specified Categoria.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->checkPermission('show_categoria');
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categorias.singular')]));

            return redirect(route('precadastro.categorias.index'));
        }

        return view('precadastro.categorias.show')->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified Categoria.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->checkPermission('edit_categoria');
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categorias.singular')]));

            return redirect(route('precadastro.categorias.index'));
        }

        return view('precadastro.categorias.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified Categoria in storage.
     *
     * @param int $id
     * @param UpdateCategoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriaRequest $request)
    {
        $this->checkPermission('edit_categoria');
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categorias.singular')]));

            return redirect(route('precadastro.categorias.index'));
        }

        $categoria = $this->categoriaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/categorias.singular')]));

        return redirect(route('precadastro.categorias.index'));
    }

    /**
     * Remove the specified Categoria from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->checkPermission('delete_categoria');
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categorias.singular')]));

            return redirect(route('precadastro.categorias.index'));
        }

        $this->categoriaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/categorias.singular')]));

        return redirect(route('precadastro.categorias.index'));
    }
}
