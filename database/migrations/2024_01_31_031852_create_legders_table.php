<?php

use App\Enums\SaldoEnum;
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
        Schema::create('legders', function (Blueprint $table) {
            $table->id();
            $table->integer('no_account');
            $table->string('name_account');
            $table->integer('saldo');
            $table->enum('type_saldo',[SaldoEnum::D->value,SaldoEnum::K->value]);
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legders');
    }
};
