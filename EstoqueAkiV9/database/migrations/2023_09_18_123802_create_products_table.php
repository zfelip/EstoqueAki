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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id'); // Chave estrangeira
            $table->string('nome');
            $table->string('descricao');
            $table->integer('quantidade');
            $table->float('valor', 8, 2);            
            $table->float('preco', 8, 2);
            $table->boolean('status')->nullable();
            $table->timestamps();

            $table->foreign('supplier_id')
            ->references('id')
            ->on('suppliers')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
