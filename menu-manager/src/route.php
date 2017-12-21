<?php 

Route::group(['prefix'=>'menu-manager', 'middleware'=> config('menu-manager.middleware')], function() {
	Route::get('', 'Manager\MenuManager\MenuManagerController@index')->name('menu_manager');
	Route::get('create-menu', 'Manager\MenuManager\MenuManagerController@create')->name('menu_manager.create');
	Route::post('create-menu', 'Manager\MenuManager\MenuManagerController@store');
	Route::get('edit-menu/{id}', 'Manager\MenuManager\MenuManagerController@edit')->name('menu_manager.editMenu');
	Route::post('remove-menu/{id}', 'Manager\MenuManager\MenuManagerController@remove')->name('menu_manager.removeMenu');
	// Route::get('create-item/{id}', 'Manager\MenuManager\MenuManagerController@createItem')->name('menu_manager.createItem');
	// Route::post('create-item/{id}', 'Manager\MenuManager\MenuManagerController@storeItem');
	// Route::get('render-menu', 'Manager\MenuManager\MenuManagerController@render')->name('menu_manager.render');
	// Ajax
	Route::get('create-menu-item', 'Manager\MenuManager\MenuManagerController@createMenuItem')->name('menu_manager.createMenuItem');
	Route::get('update-order', 'Manager\MenuManager\MenuManagerController@updateOrder')->name('menu_manager.updateOrder');
	Route::get('detail-menu-item/{menu_item_id}', 'Manager\MenuManager\MenuManagerController@detailMenuItem')->name('menu_manager.detailMenuItem');
	Route::post('update-menu-item', 'Manager\MenuManager\MenuManagerController@updateMenuItem')->name('menu_manager.updateMenuItem');
	Route::post('remove-menu-item', 'Manager\MenuManager\MenuManagerController@removeMenuItem')->name('menu_manager.removeMenuItem');
	Route::get('test', function() {
		 return view('menu-view::test');
	});
});
