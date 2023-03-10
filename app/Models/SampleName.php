<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleName extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sample()
    {
        return $this->hasMany(Sample::class, 'sample_id', 'id');
    }

    public function scopeSearch($query, $search)
    {
        $query->where('name', 'LIKE', '%' . $search . '%');
    }
}
