<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedor extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        "name",
        "estado",
        "cidade",
        "email",
        "cpf_cnpj",
        "telefone"
    ];

    protected $table = "fornecedores";

    public function rules()
    {
        return
        [
            "email" => "email|unique:fornecedores,email|required|max:120",
            "name" => "min:3|max:60|required",
            "telefone" => "min:13|max:13|required",
            "cpf_cnpj" => "min:11|max:14|required|unique:fornecedores,cpf_cnpj",
            "cidade" => "min:3|max:23|required",
            "estado" => "min:2|max:2|required",
        ];
    }
}
