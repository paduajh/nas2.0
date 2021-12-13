<?php

namespace App\Http\Controllers\Precadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpadateModelo;
use App\Models\PreCadastro\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    private $repository;

    public function __construct(Modelo $modelo)
    {
        $this->repository = $modelo;
    }
    
    public function index ()
    {
        $modelos = $this->repository->latest()->paginate();

        return view('admin.precadastro.modelos.index',[
             'modelos' => $modelos
        ]);
    }

    public function create()
    {
        return view ('admin.precadastro.modelos.create');
    }

    public function store(StoreUpadateModelo $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('modelo.index');
    }

    public function show($url)
    {
        $modelo = $this->repository->where ('url', $url)->first ();

        if(!$modelo)
            return redirect()->back();
        return view('admin.precadastro.modelos.show',[
            'modelo' => $modelo
        ]);
    }

    public function destroy($url)
    {
        $modelo = $this->repository->where('url',$url)->first();
        if(!$modelo)
            return redirect()->back();
        $modelo->delete();

        return redirect ()->route('modelo.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $modelos = $this->repository->search($request->filter);

        return view ('admin.precadastro.modelos.index',[
            'modelos' => $modelos,
            'filters' => $filters,
        ]);
    }

    public function edit($url)
    {
        $modelo = $this->repository->where('url', $url)->first();
        if (!$modelo)
        return redirect()->back();

        return view('admin.precadastro.modelos.edit',[
            'modelo'=> $modelo,
        ]);
    }

    public function update(StoreUpadateModelo $request, $url)
    {
        $modelo = $this->repository->where('url', $url)->first();
        if(!$modelo)
            return redirect()-> back();
            $modelo ->update($request->all());

            return redirect() -> route("modelo.index");
    }

}
