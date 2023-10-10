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
            $table->string('lead_id')->nullable();
            $table->string('time_of_cell')->nullable();;
            $table->string('person_responsible')->nullable();;
            $table->string('status')->nullable();
            $table->string('name')->nullable();;
            $table->string('email')->nullable();
            $table->string('phone')->nullable();;
            $table->string('address')->nullable();
            $table->string('company')->nullable();;
            $table->string('position')->nullable();;
            $table->string('other_email')->nullable();
            $table->string('other_phone')->nullable();
            $table->string('comment')->nullable();
            $table->string('type')->nullable();
            $table->string('country_of_residence')->nullable();;
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
