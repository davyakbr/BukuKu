<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Hapus foreign key dulu (jika ada)
            $table->dropForeign(['product_id']);
            // Hapus kolom product_id
            $table->dropColumn('product_id');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
        });
    }
};