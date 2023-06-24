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
        Schema::create('job_apply_societies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('notes')->nullable();
            $table->date('date');
            $table->unsignedBigInteger('society_id')->index('society_id');
            $table->unsignedBigInteger('job_vacancy_id')->nullable()->index('job_vacancy_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_apply_societies');
    }
};
