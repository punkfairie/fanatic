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
        Schema::create('joined', function (Blueprint $table) {
            $table->id();
            $table->timestamps(6);
            $table->foreignId('collective_id')
                  ->constrained('collectives')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('url');
            $table->string('subject');
            $table->string('image')->nullable();
            $table->boolean('approved');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('joined');
    }
};
