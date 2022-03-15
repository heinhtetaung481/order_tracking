<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryInformation extends Model
{
    use HasFactory;

    protected $table = "delivery_informations";
    protected $fillable = ['timestamp', 'status', 'order_code'];

    public $timestamps = false;

    public function order(){
        return $this->belongsTo(Order::class, 'order_code', 'order_code');
    }

    public function timestamp(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => gmdate("d-m-Y\TH:i:s\Z", $value),
            set: fn ($value) => strtotime($value),
        );
    }
}
