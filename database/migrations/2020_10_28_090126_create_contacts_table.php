<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->date('birthday');
            $table->string('job_title');
            $table->string('city');
            $table->string('country');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('created_at');
            $table->integer('updated_at');
            $table->integer('delete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
