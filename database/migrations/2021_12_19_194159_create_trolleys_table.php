<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrolleysTable extends Migration
{
    public function up()
    {
        Schema::create('trolleys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['in', 'batal', 'lunas'])->default('in');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trolleys');
    }
}
