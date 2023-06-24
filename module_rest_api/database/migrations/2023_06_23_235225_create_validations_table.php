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
        Schema::create('validations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_category_id')->index('validations_job_category_id_foreign');
            $table->unsignedBigInteger('society_id')->index('consultations_society_id_foreign');
            $table->unsignedBigInteger('validator_id')->nullable()->index('consultations_doctor_id_foreign');
            $table->enum('status', ['accepted', 'declined', 'pending'])->default('pending');
            $table->text('work_experience')->nullable();
            $table->text('job_position')->nullable();
            $table->text('reason_accepted')->nullable();
            $table->text('validator_notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validations');
    }
};
