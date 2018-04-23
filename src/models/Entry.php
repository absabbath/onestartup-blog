<?php

namespace Onestartup\Blog\Model;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'entries';

    protected $fillable = [
    	'title',
		'slug',
		'body',
		'status',
		'cover',
		'tags',
		'publication_date',
		'views',
		'user_id',
		'category_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('Onestartup\Blog\Model\EntryCategory', 'category_id');
    }
}
