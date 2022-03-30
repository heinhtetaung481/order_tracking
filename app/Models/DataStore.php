<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Redsnapper\LaravelVersionControl\Models\BaseModel;

class DataStore extends BaseModel
{
    use HasFactory;

    // protected $primaryKey = 'order_code';

    protected $guarded = ['id'];

    // public $incrementing = false;
    public $timestamps = false;

    // protected $keyType = 'string';

    // public function deliveries(){
    //     return $this->hasMany(DeliveryInformation::class, 'order_code', 'order_code');
    // }
    // public function timestamp(): Attribute
    // {
    //     return Attribute::make(
    //         // get: fn ($value) => gmdate("d-m-Y\TH:i:s\Z", $value),
    //         set: fn ($value) => strtotime($value),
    //     );
    // }
}
