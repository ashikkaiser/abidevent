<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statics', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('top_pitch_velocity')->nullable();
            $table->string('fb_range')->nullable();
            $table->string('top_spin')->nullable();
            $table->string('top_ch_velocity')->nullable();
            $table->string('top_ch_spin')->nullable();
            $table->string('top_cb_velocity')->nullable();
            $table->string('top_cb_spin')->nullable();
            $table->string('top_sl_velocity')->nullable();
            $table->string('top_sl_spin')->nullable();
            $table->string('top_ct_velocity')->nullable();
            $table->string('top_ct_spin')->nullable();
            $table->string('top_kn_velocity')->nullable();
            $table->string('top_kn_spin')->nullable();
            $table->string('top_exit_velocity')->nullable();
            $table->string('max_distance')->nullable();
            $table->string('avarage_distance')->nullable();
            $table->string('inf_velocity')->nullable();
            $table->string('of_velocity')->nullable();
            $table->string('c_pop')->nullable();
            $table->string('vertical_jump')->nullable();
            $table->string('40yd_sprint_time')->nullable();
            $table->string('3d_resistance_score')->nullable();
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
        Schema::dropIfExists('statics');
    }
}
