<?php

namespace Manager\MenuManager;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $guarded = array();

    public function children() {
    	return $this->hasMany('Manager\MenuManager\MenuItem', 'parent_id')->orderBy('order', 'asc');
    }

    public function hasChildren() {
    	return $this->children()->count() != 0;
    }
}
