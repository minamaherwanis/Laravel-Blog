<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// كلاس البوست بيمثل جدول "posts" في قاعدة البيانات
class Post extends Model
{
    use HasFactory; // دي عشان نقدر نستخدم factory لإنشاء بيانات تجريبية

    // الأعمدة اللي مسموح نضيف أو نعدل فيها دفعة واحدة (Mass Assignment)
    protected $fillable = [
        'title',        // عنوان البوست
        'description',  // وصف البوست
        'user_id',      // رقم المستخدم اللي كتب البوست
    ];

    // العلاقة بين البوست والمستخدم
    // كل بوست بينتمي لمستخدم واحد
    public function user()
    {
        return $this->belongsTo(User::class); // البوست بيرتبط بمستخدم عن طريق user_id
    }
}
