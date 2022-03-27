<?php

namespace App\Models\PreCadastro;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class NaturezaSinistro
 * @package App\Models\PreCadastro
 * @version March 27, 2022, 6:49 pm UTC
 *
 * @property string $nome
 * @property string $descricao
 */
class NaturezaSinistro extends Model
{
    use SoftDeletes;


    public $table = 'natureza_sinistros';
    

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
