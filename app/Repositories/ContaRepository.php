<?php

namespace App\Repositories;

use App\Models\PreCadastro\Conta;
use App\Repositories\BaseRepository;

/**
 * Class ContaRepository
 * @package App\Repositories
 * @version March 27, 2022, 6:59 pm UTC
*/

class ContaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo',
        'descricao',
        'branco',
        'agencia',
        'conta'
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
        return Conta::class;
    }
}
