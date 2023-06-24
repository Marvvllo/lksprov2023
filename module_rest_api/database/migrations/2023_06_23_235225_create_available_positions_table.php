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
        Schema::create('available_positions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_vacancy_id')->index('spot_vaccines_spot_id_foreign');
            $table->string('position')->nullable();
            $table->bigInteger('capacity')->nullable()->default(1);
            $table->bigInteger('apply_capacity')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('available_positions');
    }
};
