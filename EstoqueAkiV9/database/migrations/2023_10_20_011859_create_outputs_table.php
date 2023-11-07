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
        Schema::create('outputs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Chave estrangeira
            $table->integer('quantidade');
            $table->string('tipo'); //provavelmente será boolean (Descarte/Vendido) ou não, pode ter usado
            $table->timestamps();
            
            $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outputs');
    }
};
