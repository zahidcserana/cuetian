<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            //$table->string('password', 60);
            $table->string('batch');
            $table->string('department');
            $table->string('mobile');
            $table->string('hall');
            $table->string('three_chillah');
            $table->string('foreign_safar');
            $table->string('marital_status');
            $table->string('country');
            $table->string('city');
            $table->string('image');
            $table->rememberToken();
            $table->integer('added_by');
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
        Schema::dropIfExists('students');
    }
}
