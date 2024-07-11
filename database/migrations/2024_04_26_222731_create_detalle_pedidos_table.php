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
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
            $table->integer('cantidad');
            $table ->unsignedBigInteger('id_producto');
            $table ->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table ->unsignedBigInteger('id_pedido');
            $table ->foreign('id_pedido')->references('id')->on('pedidos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedidos');
    }
};
