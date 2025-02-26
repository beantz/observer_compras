<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('message_adm', function(Blueprint $table) {
            $table->id();
            $table->string('messages');
            $table->timestamps();
        });

        Schema::create('message_user', function(Blueprint $table) {
            $table->id();
            $table->string('messages');
            $table->timestamps();
        });

        Schema::create('message_other_user', function(Blueprint $table) {
            $table->id();
            $table->string('messages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_adm');
        Schema::dropIfExists('message_user');
        Schema::dropIfExists('message_other_user');
    }
};
