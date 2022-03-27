<?php

namespace App\Repositories;

use App\Models\PreCadastro\CentroCusto;
use App\Repositories\BaseRepository;

/**
 * Class CentroCustoRepository
 * @package App\Repositories
 * @version March 27, 2022, 6:52 pm UTC
*/

class CentroCustoRepository extends BaseRepository
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
        return CentroCusto::class;
    }
}
