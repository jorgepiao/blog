<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('url')->unique()->nullable();
            $table->text('extracto')->nullable();
            $table->mediumText('iframe')->nullable();
            $table->mediumText('cuerpo')->nullable();
            $table->timestamp('fecha_publicacion')->nullable();
            $table->unsignedInteger('categoria_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
