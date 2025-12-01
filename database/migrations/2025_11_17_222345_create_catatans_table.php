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
    Schema::create('catatan', function (Blueprint $table) {
    $table->id()->autoIncrement();
            $table->string('judul');
            $table->text('isi');
            $table->timestamps();

});
}
public function down(): void
    {
        Schema::dropIfExists('catatans');
    }
};
