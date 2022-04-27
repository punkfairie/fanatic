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
        Schema::create('owned', function (Blueprint $table) {
            $table->id();
            $table->timestamps(6);
            $table->foreignId('collective_id')
                  ->constrained('collectives')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('subject');
            $table->enum('status', ['current', 'upcoming']);
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('opened', 6)->nullable();
            $table->boolean('hold_member_updates')->default(true);
            $table->boolean('notify_pending')->default(true);
            $table->string('sort_by')->default('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('owned');
    }
};
