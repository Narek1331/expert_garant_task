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
        Schema::create('c_documents_previous_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->text('content');
            $table->timestamps();

            $table->foreign('document_id')
            ->references('id')
            ->on('c_documents')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_documents_previous_contents');
    }
};
