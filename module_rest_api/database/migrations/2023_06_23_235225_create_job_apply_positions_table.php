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
        Schema::create('job_apply_positions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('society_id')->index('job_apply_position_society_id_foreign');
            $table->unsignedBigInteger('job_vacancy_id')->nullable()->index('job_apply_position_job_vacancy_id_foreign');
            $table->unsignedBigInteger('position_id')->nullable()->index('job_apply_position_id_foreign');
            $table->unsignedBigInteger('job_apply_societies_id')->nullable()->index('job_apply_position_job_apply_societies_id_foreign');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_apply_positions');
    }
};
