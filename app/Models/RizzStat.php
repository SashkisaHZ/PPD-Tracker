<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RizzStat extends Model
{
    protected $table = 'rizz_stats'; // use your actual table name

    protected $fillable = [
        'user_id',
        'rizzScore',
        'confidenceLevel',
        'socialInteractions',
        'created_at',
        'updated_at',
    ];

    // Optionally: format date if needed
    protected $dates = ['created_at', 'updated_at'];
}
