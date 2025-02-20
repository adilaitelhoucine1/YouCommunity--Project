<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->datetime('date');
            $table->string('location');
            $table->timestamps();
            $table->string('lieu');
            $table->integer('max_participants')->nullable();
            $table->enum('status', ['A venir', 'Passé'])->default('A venir');
           
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}; 