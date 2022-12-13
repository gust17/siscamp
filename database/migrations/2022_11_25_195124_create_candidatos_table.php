<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Pleito::class);
            $table->foreignIdFor(\App\Models\Cargo::class);
            $table->foreignIdFor(\App\Models\Partido::class);
            $table->string('name');
            $table->string('numero');
            $table->foreignIdFor(\App\Models\Cidade::class)->nullable();

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
        Schema::dropIfExists('candidatos');
    }
};
