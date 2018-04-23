<?php

namespace Onestartup\Blog\Model;

use Illuminate\Database\Eloquent\Model;

class EntryTag extends Model
{
    protected $table = 'entry_tags';
    protected $fillable = ["description"];
}
