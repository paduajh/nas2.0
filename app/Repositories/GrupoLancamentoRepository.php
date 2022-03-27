<?php

namespace App\Repositories;

use App\Models\PreCadastro\GrupoLancamento;
use App\Repositories\BaseRepository;

/**
 * Class GrupoLancamentoRepository
 * @package App\Repositories
 * @version March 27, 2022, 6:50 pm UTC
*/

class GrupoLancamentoRepository extends BaseRepository
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
        return GrupoLancamento::class;
    }
}
