<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MiaCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mia_category', function (Blueprint $table) {
            $table->id();

            $table->string('title');
    $table->string('slug');
    $table->integer('status');
    $table->text('icon');
    $table->integer('type');
    $table->integer('is_featured');
    

            

            

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mia_category');
    }
}