<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classes_id');
            $table->foreign('classes_id')->references('id')->on('classes');

            $table->unsignedBigInteger('informants_id');
            $table->foreign('informants_id')->references('id')->on('informants');

            $table->integer('cartNumber');
            $table->date('dateReceipt');
            $table->string('hisReceipt');
            $table->integer('moisture');
            $table->string('dateMoisture');
            $table->integer('Effectiveness');
            $table->string('dateEffectiveness');
            $table->integer('alkaline');
            $table->string('dateAlkaline');
            $table->integer('roughness')->nullable();
            $table->integer('softness')->nullable();
            $table->integer('treboli')->nullable();
            $table->integer('rehydration')->nullable();
            $table->text('Notes')->nullable();
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
        Schema::dropIfExists('samples');
    }
}
