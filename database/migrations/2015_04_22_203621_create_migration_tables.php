<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMigrationTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        // Create faculty members table
        Schema::create('fac_members', function(Blueprint $table)
        {
            $table->string('username')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title');
            $table->string('email');
            $table->string('phone');
            $table->string('office');
            $table->timestamps();
        });

        // Create technologies table
        Schema::create('fac_technologies', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string("faculty_username");
            $table->foreign('faculty_username')->references('username')->on('fac_members')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });

        // Create skills table
        Schema::create('fac_skills', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string("faculty_username");
            $table->foreign('faculty_username')->references('username')->on('fac_members')->onDelete('cascade');
            $table->string('name');
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
        Schema::drop('fac_skills');
        Schema::drop('fac_technologies');
        Schema::drop('fac_members');
	}

}
