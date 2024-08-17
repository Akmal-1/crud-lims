<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('type_sample');
            $table->string('batch_lot');
            $table->text('description')->nullable(); // nullable karena tidak wajib diisi
            $table->string('name');
            $table->timestamps(); // otomatis membuat created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
