<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('travel_expenses', function (Blueprint $table) {
            $table->id('expense_id');
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('travel_request_id')->unsigned()->nullable();
            $table->string('tr_track_no', 255);
            $table->decimal('transportation', 10, 2);
            $table->decimal('accommodation', 10, 2);
            $table->decimal('meal', 10, 2);
            $table->decimal('other_expenses_amount', 10, 2);
            $table->decimal('total', 10, 2)->nullable();
            $table->string('other_expenses', 255);
            $table->string('attachments', 50)->nullable();
            $table->date('date');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('tr_track_no')->references('tr_track_no')->on('travel_requests')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('travel_request_id')->references('travel_request_id')->on('travel_requests')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_expenses');
    }
};
