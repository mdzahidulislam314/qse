<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public function campaignProducts()
    {
        return $this->hasMany(CampaignProduct::class);
    }
}
