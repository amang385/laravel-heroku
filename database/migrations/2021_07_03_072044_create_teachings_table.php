<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachings', function (Blueprint $table) {
            $table->id();
            $table->date('teachings_date')->nullable();
            $table->dateTime('teachings_datetime')->nullable();
            $table->char('teachings_class',20)->nullable();
            $table->char('teachings_subject', 100)->nullable();
            $table->string('teachings_signature')->nullable();
            $table->string('teachings_note')->nullable();
            $table->string('teachings_image')->nullable();
            $table->foreignId('classrooms_id')->nullable();
            $table->foreignId('users_id')->nullable();
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
        Schema::dropIfExists('teachings');
    }
}
