<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Income extends Model
{
    use HasFactory;

    protected $fillable = array('income_date', 'income_description', 'income_value');


    public function setIncomeDateAttribute($value)
    {
        $this->attributes['income_date'] = Carbon::createFromFormat('d-m-Y', $value)->toDateTimeString();
    }

    protected static function boot(){

        parent::boot();

        static::creating(function ($query) {
            $query->user_id = auth()->id();
        });

    }
}
