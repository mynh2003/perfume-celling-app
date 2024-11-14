<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin'; // Tên bảng trong CSDL

    // Các thuộc tính có thể được gán
    protected $fillable = ['username', 'fullname', 'password'];

    // Mã hóa mật khẩu trước khi lưu
    public static function boot()
    {
        parent::boot();
        
        static::creating(function ($admin) {
            $admin->password = bcrypt($admin->password); // Mã hóa mật khẩu
        });
    }
    public $timestamps = false;
}
