<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeSearch($query, $request){
        if(isset($request->search)){
            $query->where('quantity', 'LIKE', '%'.$request->search.'%')->orWhere('name', 'LIKE', '%'.$request->search.'%');
        }
    }

    public function scopeFilter($query, $request){
        if(isset($request->filter)){
            $query->where('type', 'LIKE', '%'.$request->filter.'%');
        }
    }
}
