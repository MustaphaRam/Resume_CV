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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('lastname', 50);
            $table->date('date_birth',10);
            $table->string('gender',10);
            $table->string('image_profile',150);
            $table->string('situation_family',15);
            $table->string('country',20);
            $table->text('my_profile', 400);
            $table->string('hobbies', 150);
            $table->unsignedBigInteger('cv_id')->unsigned();
            $table->foreign('cv_id')->references('id')->on('cv')->onDelete('cascade')->onUpdate('CASCADE');

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
        Schema::table('profile', function (Blueprint $table) {
            $table->dropForeign(['cv_id']);
        });
    }
};
