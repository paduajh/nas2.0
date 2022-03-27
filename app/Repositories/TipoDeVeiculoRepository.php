<?php

namespace App\Repositories;

use App\Models\PreCadastro\TipoDeVeiculo;
use App\Repositories\BaseRepository;

/**
 * Class TipoDeVeiculoRepository
 * @package App\Repositories
 * @version March 27, 2022, 6:37 pm UTC
*/

class TipoDeVeiculoRepository extends BaseRepository
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
        return TipoDeVeiculo::class;
    }
}
