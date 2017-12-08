<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function getParentsAttribute()
    {
        $parents = collect([]);
    
        $parent = $this->parent;
    
        while(!is_null($parent)) {
            $parents->prepend($parent);
            $parent = $parent->parent;
        }
    
        return $parents;
    }
}
