<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('job_openings', function (Blueprint $table) {
            $table->date('date_needed')->change();
        });
    }

    public function down()
    {
        Schema::table('job_openings', function (Blueprint $table) {
            $table->integer('date_needed')->change();
        });
    }

};
