<?php

namespace App\Models\PreCadastro;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class FormaPagamento
 * @package App\Models\PreCadastro
 * @version March 27, 2022, 7:11 pm UTC
 *
 * @property string $nome
 * @property string $descricao
 */
class FormaPagamento extends Model
{
    use SoftDeletes;


    public $table = 'forma_pagamentos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nome',
        'descricao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'descricao' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required'
    ];

    
}
