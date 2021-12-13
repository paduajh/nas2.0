<?php

namespace App\Models\PreCadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $fillable =['name', 'url'];

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%$filter%")
                        ->paginate();
        return $results;
    }  
    use HasFactory;
}
