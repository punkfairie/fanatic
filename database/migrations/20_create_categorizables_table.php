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
        Schema::create('categorizables', function (Blueprint $table) {
            $table->id();
            $table->timestamps(6);
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            $table->unsignedBigInteger('categorizable_id');
            $table->string('categorizable_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('categorizable');
    }
};
