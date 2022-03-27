<?php

namespace App\Repositories;

use App\Models\PreCadastro\DocumentoAviso;
use App\Repositories\BaseRepository;

/**
 * Class DocumentoAvisoRepository
 * @package App\Repositories
 * @version March 27, 2022, 6:47 pm UTC
*/

class DocumentoAvisoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'descricao'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DocumentoAviso::class;
    }
}
