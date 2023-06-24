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
        Schema::table('job_apply_positions', function (Blueprint $table) {
            $table->foreign(['position_id'], 'job_apply_position_id_foreign')->references(['id'])->on('available_positions')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['job_apply_societies_id'], 'job_apply_position_job_apply_societies_id_foreign')->references(['id'])->on('job_apply_societies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['job_vacancy_id'], 'job_apply_position_job_vacancy_id_foreign')->references(['id'])->on('job_vacancies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['society_id'], 'job_apply_position_society_id_foreign')->references(['id'])->on('societies')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_apply_positions', function (Blueprint $table) {
            $table->dropForeign('job_apply_position_id_foreign');
            $table->dropForeign('job_apply_position_job_apply_societies_id_foreign');
            $table->dropForeign('job_apply_position_job_vacancy_id_foreign');
            $table->dropForeign('job_apply_position_society_id_foreign');
        });
    }
};
