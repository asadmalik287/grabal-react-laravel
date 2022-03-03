<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('business_name')->nullable();
            $table->string('role_id')->nullable();
            $table->string('password')->nullable();
            $table->string('country')->nullable();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->string('town')->nullable();
            $table->tinyInteger('is_verified')->default(0)->nullable();
            $table->string('contact_person')->nullable();
            $table->string('vetting_doc')->nullable();
            $table->string('vaccinations_doc')->nullable();
            $table->string('certifications_doc')->nullable();
            $table->enum('status', ['approved','pending','rejected'])->default('pending');
            $table->string('message')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
