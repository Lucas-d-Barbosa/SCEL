<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string("name", 60);
            $table->string("email", 120);
            $table->string("telefone", 13);
            $table->string("cpf_cnpj", 14);
            $table->string("cidade", 23);
            $table->string("estado", 2);
            $table->unique("cpf_cnpj");
            $table->unique("email");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
    }
};
