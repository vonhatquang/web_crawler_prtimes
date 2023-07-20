<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redeliveries extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'project_title',
        'requester_name',
        'pickup_zipcode',
        'pickup_add1',
        'pickup_add2',
        'pickup_tel',
        'delivery_zipcode',
        'delivery_add1',
        'delivery_add2',
        'delivery_tel',
        'delivery_name',
        'delivery_date',
        'delivery_date_display',
        'package_type',
        'package_type_name',
        'quantity',
        'fare_amount',
        'delivery_driver',
        // 'delivery_driver_display',
        'status_id',
        'status_name',
        'package_code',
        'storage_period',
        'note',
        'redelivery_date',
        'redelivery_time_id',
        'redelivery_time_name',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

}
