<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('subject');
            $table->enum('department', ['Page cannot be loaded', 'Cannot register program', 'Feedback form not available', 'Payment not accepted/error']);
            $table->text('description');
            $table->enum('priority', ['Low', 'Medium', 'High']);
            $table->enum('status', ['Open', 'Closed']);
            $table->text('thumbnail_path');
            $table->string('assign_to')->nullable();
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
        Schema::dropIfExists('support_tickets');
    }
}
