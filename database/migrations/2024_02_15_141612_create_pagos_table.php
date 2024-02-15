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
        Schema::create('pagos', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->year('anio_explotacion');
            $table->decimal('importe', 10, 2);
            $table->string('factura');
            $table->unsignedBigInteger('estadopago_id')->default(1);

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('estadopago_id')->references('id')->on('estadopagos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
