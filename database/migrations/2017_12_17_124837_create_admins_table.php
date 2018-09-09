<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('super')->default(false);
            $table->string('name');
            $table->string('middle_name');
            $table->string('surname');
            $table->string('position');
            $table->string('phone')->nullable();
            $table->string('email')->index();
            $table->string('password')->nullable();
            $table->string('ip')->nullable()->index();
            $table->string('last_ip')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}