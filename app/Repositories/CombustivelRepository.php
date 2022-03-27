<?php

namespace App\Repositories;

use App\Models\PreCadastro\Combustivel;
use App\Repositories\BaseRepository;

/**
 * Class CombustivelRepository
 * @package App\Repositories
 * @version March 27, 2022, 6:44 pm UTC
*/

class CombustivelRepository extends BaseRepository
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
        return Combustivel::class;
    }
}
