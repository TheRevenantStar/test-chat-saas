<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatabaseInitiator extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id('id'); //Internal User ID
      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->useCurrent();
      $table->timestamp('deleted_at')->nullable();
      $table->string('username')->unique();
      $table->string('password');
      $table->string('display_name');
      $table->text('bio');
    });
    Schema::create('guilds', function (Blueprint $table) {
      $table->id('id'); //Guild ID
      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->useCurrent();
      $table->timestamp('deleted_at')->nullable();
      $table->foreignId('user_id')->references('id')->on('users');
      $table->text('display_name');
    });
    Schema::create('messages', function (Blueprint $table){
      $table->id('id'); //Message ID
      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->useCurrent();
      $table->foreignId('guild_id')->references('id')->on('guilds');
      $table->foreignId('user_id')->references('id')->on('users');
      $table->text('content');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('messages');
    Schema::dropIfExists('guilds');
    Schema::dropIfExists('users');
  }
}
