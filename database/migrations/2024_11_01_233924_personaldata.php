<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //

        Schema::table('users', function (Blueprint $table) {
            $table->string('CPF')->unique()->index();
            $table->string('RG')->nullable();
            $table->string('RG_emissor')->nullable();
            $table->date('RG_emissao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('CPF');   // Drops the 'CPF' column
            $table->dropColumn('RG');    // Drops the 'RG' column
            $table->dropColumn('RG_emissor'); // Drops the 'RG_emissor' column
            $table->dropColumn('RG_emissao'); // Drops the 'RG_emissao' column
        });
    }
};
