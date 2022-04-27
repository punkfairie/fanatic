<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('collectives', function (Blueprint $table) {
            $table->id();
            $table->rememberToken();
            $table->timestamps(6);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at', 6)->nullable();
            $table->string('title');
            $table->string('password');
            $table->integer('per_page')->unsigned()->default(15);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
