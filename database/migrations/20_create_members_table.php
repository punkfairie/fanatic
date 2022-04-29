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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->timestamps(6);
            $table->string('name');
            $table->string('email');
            $table->boolean('show_email');
            $table->foreignId('country_id')
                  ->constrained('countries')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            $table->string('password');
            $table->string('url')->nullable();
            $table->longText('comments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
