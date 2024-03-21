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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('stu_name');
            $table->string('stu_address');
            $table->string('stu_dob');
            $table->string('stu_contact');
            $table->enum('stu_Gender',['Male','Female','Others'])->nullable();
            $table->string('stu_image')->nullable();
            $table->unsignedBigInteger('stu_class')->nullable();
            $table->foreign('stu_class')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
            $table->text('stu_desc')->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
