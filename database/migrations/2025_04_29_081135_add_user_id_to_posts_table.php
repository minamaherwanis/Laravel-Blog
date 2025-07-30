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
        // تعديل على جدول posts الموجود
        Schema::table('posts', function (Blueprint $table) {
            
                                                             // إضافة عمود جديد اسمه user_id 
                                                             // لتخزين رقم المستخدم صاحب المنشور
                                                            // لازم يكون نفس نوع الـ id
                                                            //  الموجود في جدول users (unsignedBigInteger)
         $table->unsignedBigInteger('user_id')->nullable();
    
                                                            // تحديد إن user_id هو مفتاح أجنبي مرتبط بعمود id في جدول users
                                                            // ده بيضمن إن كل منشور مرتبط بمستخدم موجود فعلاً
            $table->foreign('user_id')->references('id')->on('users');
        });
    }};
