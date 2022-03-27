<?php

namespace App\Repositories;

use App\Models\PreCadastro\TipoDeEndereco;
use App\Repositories\BaseRepository;

/**
 * Class TipoDeEnderecoRepository
 * @package App\Repositories
 * @version March 27, 2022, 6:46 pm UTC
*/

class TipoDeEnderecoRepository extends BaseRepository
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
        return TipoDeEndereco::class;
    }
}
