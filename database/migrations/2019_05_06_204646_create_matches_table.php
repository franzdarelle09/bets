<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('team_a');
            $table->bigInteger('team_b');
            $table->string('slug')->unique();
            $table->integer('number_of_matches')->nullable();
            $table->bigInteger('parent_id')->unsigned()->index()->nullable();
            $table->string('stream')->nullable();
            $table->string('match_status')->nullable()->comment = 'upcoming/ongoing/waiting for settlement/settled';
            $table->tinyInteger('status');
            $table->dateTime('scheduled_date');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('matches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
