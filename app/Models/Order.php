<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Danh sách các thuộc tính có thể gán giá trị
    protected $fillable = [
        'user_id',
        'order_date',
        'status',
        'total_price',
        'phone',
        'shipping_address'
    ];

    // Thiết lập mối quan hệ với OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Mối quan hệ với người dùng (nếu bạn có model User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $timestamps = false;
}
