<?php

namespace App\Repositories;

use App\Models\PreCadastro\NaturezaSinistro;
use App\Repositories\BaseRepository;

/**
 * Class NaturezaSinistroRepository
 * @package App\Repositories
 * @version March 27, 2022, 6:49 pm UTC
*/

class NaturezaSinistroRepository extends BaseRepository
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
        return NaturezaSinistro::class;
    }
}
