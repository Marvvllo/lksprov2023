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
        Schema::table('job_apply_societies', function (Blueprint $table) {
            $table->foreign(['job_vacancy_id'], 'apply_job_vacancy_id_foreign')->references(['id'])->on('job_vacancies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['society_id'], 'apply_society_id_foreign')->references(['id'])->on('societies')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_apply_societies', function (Blueprint $table) {
            $table->dropForeign('apply_job_vacancy_id_foreign');
            $table->dropForeign('apply_society_id_foreign');
        });
    }
};
