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
        Schema::create('type_operations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });



        Schema::create('statements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('account_id')->unsigned();
            $table->bigInteger('agency_id')->unsigned();
            $table->double('value');
            $table->bigInteger('deposit_account_id')->unsigned();
            $table->bigInteger('deposit_agency_id')->unsigned();
            $table->date('date');
            $table->bigInteger('type_operation_id')->unsigned();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('agency_id')->references('id')->on('agencies');
            $table->foreign('deposit_account_id')->references('id')->on('accounts');
            $table->foreign('deposit_agency_id')->references('id')->on('agencies');
            $table->foreign('type_operation_id')->references('id')->on('type_operations');
            $table->timestamps();
        });

     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //

        Schema::dropIfExists('statements');
        Schema::dropIfExists('type_operations');
    }
};
