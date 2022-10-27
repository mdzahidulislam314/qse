<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function user()
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }
}
