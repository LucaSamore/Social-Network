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
            $table->uuid('id');
            $table->string('tag_name');
            $table->uuid('post_id');
            $table->primary('id');
            $table->foreign('tag_name')->references('name')->on('tags');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
