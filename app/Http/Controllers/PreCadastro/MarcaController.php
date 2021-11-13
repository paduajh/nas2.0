<?php

namespace App\Http\Controllers\PreCadastro;

use App\Http\Controllers\Controller;
use App\Models\PreCadastro\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{

    private $repository;

    public function __construct(Marca $marca)
    {
        $this->repository = $marca;
    }

    public function index ()
    {
        $marcas= $this->repository->all();

        return view('admin.precadastro.marca.index',[
            'marcas' => $marcas
        ]);
    }
}
