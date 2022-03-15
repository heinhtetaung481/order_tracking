<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_code';

    protected $fillable = ['order_code'];

    public $incrementing = false;
    public $timestamps = false;

    protected $keyType = 'string';

    public function deliveries(){
        return $this->hasMany(DeliveryInformation::class, 'order_code', 'order_code');
    }
}
