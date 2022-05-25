<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('school_level')->nullable();
            $table->string('school_name')->nullable();
            $table->string('state')->nullable();
            $table->string('position')->nullable();
            $table->string('top_pitch_velocity')->nullable();
            $table->string('average_velocity')->nullable();
            $table->string('sprit_time')->nullable();
            $table->string('vertical_jump_height')->nullable();
            $table->string('hitting_rap')->nullable();
            $table->string('resistance_ratio')->nullable();
            $table->string('velocity_video')->nullable();
            $table->string('valo_video_date')->nullable();
            $table->string('velocity_video2')->nullable();
            $table->string('valo_video_date2')->nullable();
            $table->string('sprint_video')->nullable();
            $table->string('sprint_video_date')->nullable();
            $table->string('jump_video_link')->nullable();
            $table->string('jump_video_link_date')->nullable();
            $table->string('hitting_video')->nullable();
            $table->string('hitting_video_date')->nullable();
            $table->string('resistance_video')->nullable();
            $table->string('resistance_video_date')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('students');
    }
}
