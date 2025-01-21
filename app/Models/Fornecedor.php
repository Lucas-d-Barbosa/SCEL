<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedor extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        "nome",
        "estado",
        "cidade",
        "email",
        "cpf_cnpj",
        "telefone"
    ];

    protected $table = "fornecedores";
}
