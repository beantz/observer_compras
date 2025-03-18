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
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->timestamps();
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            //criar foreing user id
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('itens_pedidos', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('itens_id');
            $table->unsignedBigInteger('pedido_id');
            $table->timestamps();

            $table->foreign('itens_id')->references('id')->on('itens');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('itens_pedidos');
        Schema::dropIfExists('pedidos');
        Schema::enableForeignKeyConstraints();

        Schema::dropIfExists('itens');
    }
};
