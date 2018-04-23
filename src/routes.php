<?php

Route::group(['middleware' => ['web', 'auth', 'is_admin']], function(){

	Route::get('admin/blog','Onestartup\Blog\Controller\AdminBlogController@list')
		->name('blog.list');
	Route::resource('admin/blog/category', 'Onestartup\Blog\Controller\CategoryController', ['as'=>'blog.admin']);
	Route::delete('delete/cover/category/{id}', 'Onestartup\Blog\Controller\CategoryController@deleteCover')
		->name('delete.cover.category');
	
});
