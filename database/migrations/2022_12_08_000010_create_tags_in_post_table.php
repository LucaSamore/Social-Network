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
        Schema::create('tags_in_post', function (Blueprint $table) {
            $table->string('tagName');
            $table->uuid('postId');
            $table->primary(['tagName','postId']);
            $table->foreign('tagName')->references('name')->on('tags');
            $table->foreign('postId')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_in_post');
    }
};
