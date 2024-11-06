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
        

        Schema::dropIfExists('profiles');
        Schema::create('profiles', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name');            
        });            
        
        Schema::table('users', function (Blueprint $table) {            
            $table->bigInteger('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('restrict')->onUpdate('cascade');
        });




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('profiles');
        Schema::table('users', function (Blueprint $table) {
           $table->dropColumn('profile_id'); 
        });

    }
};
