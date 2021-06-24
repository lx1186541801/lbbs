<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // protected $timestamps = false;

    protected $fillable = ['name', 'description'];

	
	public function categories()
    {

    	if (is_null(cache('categories'))) {
    		cache(['categories' => $this->all()], 3600);
    	}

    	return cache('categories');
    }    

}
