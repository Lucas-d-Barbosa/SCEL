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
        try
        {
            $request->validate($this->model->rules());
            $fornecedor = $this->model->create($request->all());
            return response()->json($fornecedor, 201);
        }
        catch(\Illuminate\Validation\ValidationException $e)
        {
            return response()->json([
                'error' => 'Erro de validação',
                'messages' => $e->errors()
            ], 422);
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao criar o recurso',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $fornecedor = $this->model->find($id);
            if($fornecedor !== null){
                return response()->json($fornecedor, 200);
            }
            return response()->json(["Erro" => "Recurso não encontrado!"], 404);
        } catch(Exception $e){
            return response()->json(
                [
                "Erro" => "Erro ao acessar o recurso", 
                "mensagem" => $e->getMessage()
            ], 505);
        }
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
        try
        {
            $fornecedor = $this->model->find($id);

            if($request->method() === "PATCH")
            {
                return response()->json(["msg" => "Método PUT"], 201);
            }
            $request->validate($this->model->rules($id));
            $fornecedor->update($request->all());
        }
        catch(\Illuminate\Validation\ValidationException $e)
        {
            return response()->json([
                'error' => 'Erro de validação',
                'messages' => $e->errors()
            ], 422);

        }
        catch(Exception $e)
        {
            return response()->json(
                [
                "Erro" => "Erro ao atualizar o recurso", 
                "mensagem" => $e->getMessage()
            ], 505);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
