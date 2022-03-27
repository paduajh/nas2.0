<?php

namespace App\Repositories;

use App\Models\PreCadastro\TipoDeCarroceria;
use App\Repositories\BaseRepository;

/**
 * Class TipoDeCarroceriaRepository
 * @package App\Repositories
 * @version March 27, 2022, 6:43 pm UTC
*/

class TipoDeCarroceriaRepository extends BaseRepository
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
        return TipoDeCarroceria::class;
    }
}
