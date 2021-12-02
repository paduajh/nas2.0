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


    public function show($url)
    {
        $marca = $this->repository->where('url', $url)->first ();
        
        //dd($marca ->all());
        if(!$marca)
            return redirect()->back();
        return view('admin.precadastro.marcas.show', [
            'marca'=>$marca
        ]);
    }

    public function destroy($url)
    {
        $marca = $this->repository->where('url', $url)->first();
        if(!$marca)
            return redirect()->back();
        $marca->delete();

        return redirect()->route('marcas.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $marcas = $this->repository->search($request->filter);

        return view('admin.precadastro.marcas.index',[
            'marcas' => $marcas,
            'filters'=> $filters,
        ]);
    }
    public function edit ($url)
    {
        $marca = $this->repository->where('url', $url)->first();
        if(!$marca)
            return redirect()->back();
        
        return view('admin.precadastro.marcas.edit',[
            'marca'=> $marca,
        ]);
    }

    public function update(Request $request, $url)
    {
        $marca = $this->repository->where('url', $url)->first();
        if(!$marca)
            return redirect()->back();

            $marca->update($request->all());

            return redirect()->route('marcas.index');
    }

}
