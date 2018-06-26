<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

class Key extends Model
{
    const ExpiryDate = 'expiry_date';
    
    public static function allKeys(){
        return static::all();
    }
    
   /**
    * Returns an Eloquent Builder holding keys that will expire soon.
    * Default is within 2.5 weeks from now
    * @param Builder $query Builder that can be extended with <br/>
    * other Eloquent commands (e.g. where, count, etc.)
    */
    public function scopeSoonToExpireKeys($query){
        $targetExpiryDate = Carbon::now()->addWeeks(2)->addDays(3)->toDateTimeString();
        return $query->where(self::ExpiryDate, '<', $targetExpiryDate);
    }
}
