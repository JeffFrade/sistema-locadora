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
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 150);
            $table->year('lancamento');
            $table->boolean('disponivel')->default(1);
            $table->bigInteger('id_categoria')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_categoria')
                ->references('id')
                ->on('categorias')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmes');
    }
};
