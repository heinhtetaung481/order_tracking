<?php

use Redsnapper\LaravelVersionControl\Database\Blueprint;
use Redsnapper\LaravelVersionControl\Database\Migration;
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
        $this->makeVcTables('data_stores', function (Blueprint $table) {
            // $table->integer('uid')->autoIncrement()->change();
            $table->string('key')->unique();
            $table->string('value');
            $table->string('timestamp');
        }, function (Blueprint $table) {
            // $table->integer('id');
            $table->string('key');
            $table->string('value');
            $table->string('timestamp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_stores');
    }
};
