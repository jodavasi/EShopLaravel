<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('SKU')->unique();;
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('imagen');
            $table->integer('stock');
            $table->float('precio');
            $table->unsignedInteger('categoria_id');
            $table->string('categoria_nombre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
