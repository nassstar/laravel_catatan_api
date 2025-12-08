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
    $table->id();
    $table->unsignedBigInteger('usr_id');
    $table->string('judul');
    $table->text('isi');
    $table->timestamps();

    //relasi ke table user
    $table->foreign('user_id')
    ->references('id')
    ->on('user')
    ->onDelete('cascade');

});

}
public function down(): void
    {
        Schema::dropIfExists('catatan');
    }
};
