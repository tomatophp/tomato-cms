<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();

            //Morph
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('model_type')->nullable();

            //SEO
            $table->foreignId('type_id')->nullable()->references('id')->on('types');
            $table->foreignId('category_id')->nullable()->references('id')->on('categories');

            //Main
            $table->string('title');
            $table->string('slug')->unique()->index();
            $table->longText('body');
            $table->text('short_description')->nullable();

            //Options
            $table->boolean('published')->default(0)->nullable();
            $table->boolean('featured')->default(0)->nullable();
            $table->date('published_at')->nullable();

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
        Schema::dropIfExists('contents');
    }
};
