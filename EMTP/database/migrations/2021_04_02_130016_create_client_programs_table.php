<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_programs', function (Blueprint $table) {
            $table->id();
            $table->string('client_email');
            $table->string('company_name');
            $table->integer('program_id');
            $table->integer('staff_id');
            $table->enum('option',['physical','online']);
            $table->string('client_venue');
            $table->integer('no_of_employees');
            $table->enum('payment_type',['cash','online banking','credit/debit card']);
            $table->enum('payment_status',['pending','approved']);
            $table->date('start_date');
            $table->date('end_date');
            $table->text('client_notes');
            $table->enum('status',['pending','to-be-confirmed','approved','rejected']);
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
        Schema::dropIfExists('client_programs');
    }
}
