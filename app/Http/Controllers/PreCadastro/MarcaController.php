<?php

namespace App\Http\Controllers\PreCadastro;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
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
        $marcas= $this->repository->latest()->paginate();

        return view('admin.precadastro.marcas.index',[
            'marcas' => $marcas
        ]);
    }
    
    public function create()
    {
        return view('admin.precadastro.marcas.create');
    }

    public function store(Request $request)
    {
        //dd ($request->all()); chegou aqui.
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('marcas.index');
    }

}
