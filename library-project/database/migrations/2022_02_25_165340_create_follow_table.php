<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('follower');
            $table->unsignedBigInteger('followee');
            $table->foreign('follower')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('followee')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamp('created_at')->now();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow');
    }
};
