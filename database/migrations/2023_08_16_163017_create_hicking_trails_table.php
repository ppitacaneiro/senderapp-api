<?php

use App\Enums\DifficultyLevel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHickingTrailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hicking_trails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('distance_kms');
            $table->integer('time_minutes');
            $table->foreignId('community_id')->references('id')->on('communities');
            $table->foreignId('province_id')->references('id')->on('provinces');
            $table->foreignId('municipality_id')->references('id')->on('municipalities');
            $table->string('origin_name');
            $table->float('origin_lat',10,6);
            $table->float('origin_lng',10,6);
            $table->string('destination_name');
            $table->float('destination_lat',10,6);
            $table->float('destination_lng',10,6);
            $table->enum('difficulty_level',[
                DifficultyLevel::Easy->value,
                DifficultyLevel::Medium->value,
                DifficultyLevel::Hard->value])->default(DifficultyLevel::Medium->value);
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
        Schema::dropIfExists('hicking_trails');
    }
}
