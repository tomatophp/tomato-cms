<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('sections');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Schema::create('sections', function (Blueprint $table) {
            $table->id();

            //Type
            $table->string('type')->default('header')->nullable();
            $table->string('view');
            $table->string('key')->unique();
            $table->string('color')->nullable();
            $table->string('icon')->default('bx bx-circle')->nullable();

            //Code
            $table->foreignId('form_id')->nullable()->constrained('forms')->onDelete('cascade');

            //Option
            $table->boolean('activated')->default(1)->nullable();

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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('sections');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
