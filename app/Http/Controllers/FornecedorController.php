<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Exception;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    protected $model;
    public function __construct(Fornecedor $model)
    {
        $this->model = $model;
    }
 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedores = $this->model->get();

        if($fornecedores !== null){
            if($fornecedores->isEmpty()){
                return response()->json(["msg" => "Nenhum fornecedor cadastrado!"], 200);
            }
            return response()->json($fornecedores, 200);
        }
        return response()->json(["msg" => "Recurso não encontrado!"],401);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate($this->model->rules());
        try{
            $request->validate($this->model->rules());
        }catch(Exception $e){
            return response()->json(["Error: " => "Passe todos os atributos necessários!"], 400);
        }
        $this->model->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fornecedor = $this->model->find($id);
        if($fornecedor !== null){
            return response()->json($fornecedor, 200);
        }
        return response()->json(["Erro" => "Recurso não encontrado!"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
