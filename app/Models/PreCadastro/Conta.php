<?php

namespace App\Models\PreCadastro;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Conta
 * @package App\Models\PreCadastro
 * @version March 27, 2022, 6:59 pm UTC
 *
 * @property string $tipo
 * @property string $descricao
 * @property string $branco
 * @property string $agencia
 * @property string $conta
 */
class Conta extends Model
{
    use SoftDeletes;


    public $table = 'contas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tipo',
        'descricao',
        'branco',
        'agencia',
        'conta'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tipo' => 'string',
        'descricao' => 'string',
        'branco' => 'string',
        'agencia' => 'string',
        'conta' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo' => 'required',
        'descricao' => 'required',
        'branco' => 'required',
        'agencia' => 'required',
        'conta' => 'required'
    ];

    
}
