<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guardian_id');
            $table->string('name');
            $table->enum('gender', ['l', 'p']);
            $table->string('nis', 20);
            $table->enum('class', ['10', '11', '12']);
            $table->text('address');
            $table->date('birth_date');
            $table->enum('majors', ['IPA', 'IPS', 'AGAMA', 'BAHASA']);
            $table->unsignedsmallInteger('height');
            $table->unsignedsmallInteger('weight');
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
        Schema::dropIfExists('students');
    }
}
