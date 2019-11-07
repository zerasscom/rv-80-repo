<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

#php artisan migrate:refresh --seed

class CreateTables extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        DB::beginTransaction();

    if (!Schema::hasTable('users')) {
            Schema::create('users', function(Blueprint $table)
            {
                $table->engine = 'MyISAM';
                  $table->increments('id');
                  $table->string('first_name', '255')->nullable();
                  $table->string('last_name', '255')->nullable();
                  $table->string('phone', '255')->nullable();
                  $table->string('email', '255')->nullable()->unique();
                  $table->timestamp('email_verified_at')->nullable();
                  $table->string('password', '255')->nullable();
                  $table->rememberToken();
                  $table->timestamp('created_at')->nullable();
                  $table->timestamp('updated_at')->nullable();
                  $table->softDeletes();
            });
        }
    if (!Schema::hasTable('leads')) {
            Schema::create('leads', function(Blueprint $table)
            {
                $table->engine = 'MyISAM';
                  $table->increments('id');
                  $table->string('first_name', '255')->nullable();
                  $table->string('last_name', '255')->nullable();
                  $table->date('birthday')->nullable();
                  $table->string('email', '255')->nullable();
                  $table->string('mobile', '255')->nullable();
                  $table->tinyInteger('optin1')->nullable()->default(0);
                  $table->tinyInteger('optin2')->nullable()->default(0);
                  $table->timestamp('created_at')->nullable();
                  $table->timestamp('updated_at')->nullable();
                  $table->softDeletes();
            });
        }

        DB::commit();
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        DB::beginTransaction();
        //..drop all tables
        Schema::disableForeignKeyConstraints();
        if (Schema::hasTable('users')) {

            Schema::dropIfExists('users');
        }
        if (Schema::hasTable('leads')) {

            Schema::dropIfExists('leads');
        }
        Schema::enableForeignKeyConstraints();
        DB::commit();
    }

}

