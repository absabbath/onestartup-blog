<?php

namespace Onestartup\Blog\Model;

use Illuminate\Database\Eloquent\Model;

class EntryCategory extends Model
{
    protected $table = 'entry_categories';
    protected $fillable = ["name","description","cover", "active", "slug"];

    public function entries()
    {
        return $this->hasMany('Onestartup\Blog\Model\Entry', 'category_id');
    }
}
