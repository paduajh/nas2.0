<?php

namespace App\Repositories;

use App\Models\PreCadastro\FormaPagamento;
use App\Repositories\BaseRepository;

/**
 * Class FormaPagamentoRepository
 * @package App\Repositories
 * @version March 27, 2022, 7:11 pm UTC
*/

class FormaPagamentoRepository extends BaseRepository
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
        return FormaPagamento::class;
    }
}
