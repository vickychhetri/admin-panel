<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function customer(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sampleName(){
        return $this->belongsTo(SampleName::class, 'sample_id', 'id');
    }
}
