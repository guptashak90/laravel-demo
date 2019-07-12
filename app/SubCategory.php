<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id','name', 'description', 'image',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
