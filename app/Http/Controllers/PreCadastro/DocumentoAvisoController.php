<?php

namespace App\Http\Controllers\PreCadastro;

use App\DataTables\PreCadastro\DocumentoAvisoDataTable;
use App\Http\Requests\PreCadastro;
use App\Http\Requests\PreCadastro\CreateDocumentoAvisoRequest;
use App\Http\Requests\PreCadastro\UpdateDocumentoAvisoRequest;
use App\Repositories\DocumentoAvisoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Traits\Authorizable;
use Response;

class DocumentoAvisoController extends AppBaseController
{
    use Authorizable;
    /** @var DocumentoAvisoRepository $documentoAvisoRepository*/
    private $documentoAvisoRepository;

    public function __construct(DocumentoAvisoRepository $documentoAvisoRepo)
    {
        $this->authorize = 'documentoaviso';
        $this->documentoAvisoRepository = $documentoAvisoRepo;
    }

    /**
     * Display a listing of the DocumentoAviso.
     *
     * @param DocumentoAvisoDataTable $documentoAvisoDataTable
     *
     * @return Response
     */
    public function index(DocumentoAvisoDataTable $documentoAvisoDataTable)
    {
        return $documentoAvisoDataTable->render('precadastro.documento_avisos.index');
    }

    /**
     * Show the form for creating a new DocumentoAviso.
     *
     * @return Response
     */
    public function create()
    {
        return view('precadastro.documento_avisos.create');
    }

    /**
     * Store a newly created DocumentoAviso in storage.
     *
     * @param CreateDocumentoAvisoRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentoAvisoRequest $request)
    {
        $input = $request->all();

        $documentoAviso = $this->documentoAvisoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/documentoAvisos.singular')]));

        return redirect(route('precadastro.documentoAvisos.index'));
    }

    /**
     * Display the specified DocumentoAviso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $documentoAviso = $this->documentoAvisoRepository->find($id);

        if (empty($documentoAviso)) {
            Flash::error(__('messages.not_found', ['model' => __('models/documentoAvisos.singular')]));

            return redirect(route('precadastro.documentoAvisos.index'));
        }

        return view('precadastro.documento_avisos.show')->with('documentoAviso', $documentoAviso);
    }

    /**
     * Show the form for editing the specified DocumentoAviso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $documentoAviso = $this->documentoAvisoRepository->find($id);

        if (empty($documentoAviso)) {
            Flash::error(__('messages.not_found', ['model' => __('models/documentoAvisos.singular')]));

            return redirect(route('precadastro.documentoAvisos.index'));
        }

        return view('precadastro.documento_avisos.edit')->with('documentoAviso', $documentoAviso);
    }

    /**
     * Update the specified DocumentoAviso in storage.
     *
     * @param int $id
     * @param UpdateDocumentoAvisoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentoAvisoRequest $request)
    {
        $documentoAviso = $this->documentoAvisoRepository->find($id);

        if (empty($documentoAviso)) {
            Flash::error(__('messages.not_found', ['model' => __('models/documentoAvisos.singular')]));

            return redirect(route('precadastro.documentoAvisos.index'));
        }

        $documentoAviso = $this->documentoAvisoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/documentoAvisos.singular')]));

        return redirect(route('precadastro.documentoAvisos.index'));
    }

    /**
     * Remove the specified DocumentoAviso from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documentoAviso = $this->documentoAvisoRepository->find($id);

        if (empty($documentoAviso)) {
            Flash::error(__('messages.not_found', ['model' => __('models/documentoAvisos.singular')]));

            return redirect(route('precadastro.documentoAvisos.index'));
        }

        $this->documentoAvisoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/documentoAvisos.singular')]));

        return redirect(route('precadastro.documentoAvisos.index'));
    }
}
