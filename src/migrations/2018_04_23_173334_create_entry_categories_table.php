<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 355);
            $table->string('description', 455)->nullable();
            $table->string('cover', 455)->nullable();
            $table->boolean('active')->default(true);
            $table->string('slug')->nullable();

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
        Schema::dropIfExists('entry_categories');
    }
}
