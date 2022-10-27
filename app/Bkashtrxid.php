<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bkashtrxid extends Model
{
    protected $table = 'bkash_trxid';

    protected $fillable = ['order_id', 'trx_id', 'submitted_at','is_verified'];
}
