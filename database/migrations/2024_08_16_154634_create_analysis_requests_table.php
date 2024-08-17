<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysisRequestsTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysis_requests', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('type_sample');
            $table->string('batch_lot');
            $table->text('description')->nullable();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analysis_requests');
    }
}
