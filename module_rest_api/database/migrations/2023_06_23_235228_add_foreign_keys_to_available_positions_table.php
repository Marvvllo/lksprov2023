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
        Schema::table('available_positions', function (Blueprint $table) {
            $table->foreign(['job_vacancy_id'], 'spot_vaccines_spot_id_foreign')->references(['id'])->on('job_vacancies')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('available_positions', function (Blueprint $table) {
            $table->dropForeign('spot_vaccines_spot_id_foreign');
        });
    }
};
