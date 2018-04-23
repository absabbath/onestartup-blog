<?php

Route::group(['middleware' => ['web', 'auth', 'is_admin']], function(){

	Route::delete('delete/cover/category/{id}', 'Onestartup\Blog\Controller\CategoryController@deleteCover')
		->name('delete.cover.category');

	Route::resource('admin/blog/tag', 'Onestartup\Blog\Controller\TagCatalogController', ['as'=>'blog.admin']);
	Route::resource('admin/blog/entry', 'Onestartup\Blog\Controller\AdminBlogController', ['as'=>'blog.admin']);
	Route::resource('admin/blog/category', 'Onestartup\Blog\Controller\CategoryController', ['as'=>'blog.admin']);
	Route::get('admin/blog/datatable', 'Onestartup\Blog\Controller\AdminBlogController@getEntries')->name('blog.datatable');
	Route::post('delete/entry/{id}', 'Onestartup\Blog\Controller\AdminBlogController@destroy')->name('delete.entry');
	Route::delete('delete/cover/entry/{id}', 'Onestartup\Blog\Controller\AdminBlogController@deleteCover')->name('delete.cover.entry');

});

Route::group(['middleware' => ['web']], function(){
	Route::get('blog/{slug}', 'Onestartup\Blog\Controller\AdminBlogController@getEntries')->name('show.blog');
});
