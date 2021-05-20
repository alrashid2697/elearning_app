<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerkeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answerkey', function (Blueprint $table) {
            $table->id();
            $table->foreignID('quiz_id')->constrained('questionnaires');
            $table->foreignID('category_id')->constrained('categories');
            $table->string('correct_answer');
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
        Schema::dropIfExists('answerkey');
    }
}
