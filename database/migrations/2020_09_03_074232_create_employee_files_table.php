<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_files', function (Blueprint $table) {
            $table->id();
            $table->integer("employee_id");
            $table->string("dir_name");
            $table->string("cv")->nullable();
            $table->string("ktp")->nullable();
            $table->string("certificate")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_files');
    }
}
