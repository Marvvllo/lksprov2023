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
        Schema::table('validations', function (Blueprint $table) {
            $table->foreign(['job_category_id'])->references(['id'])->on('job_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['society_id'])->references(['id'])->on('societies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['validator_id'])->references(['id'])->on('validators')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('validations', function (Blueprint $table) {
            $table->dropForeign('validations_job_category_id_foreign');
            $table->dropForeign('validations_society_id_foreign');
            $table->dropForeign('validations_validator_id_foreign');
        });
    }
};
