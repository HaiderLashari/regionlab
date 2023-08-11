<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('new')->nullable();
            $table->string('lead_id');
            $table->string('time_of_cell');
            $table->string('person_responsible');
            $table->string('status')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('company');
            $table->string('position');
            $table->string('other_email')->nullable();
            $table->string('other_phone')->nullable();
            $table->string('comment')->nullable();
            $table->string('type')->nullable();
            $table->string('country_of_residence');
            $table->string('nationality')->nullable();
            $table->string('addtional_detail')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
