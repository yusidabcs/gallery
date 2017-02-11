<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/gallery'], function (Router $router) {
    $router->bind('gallery', function ($id) {
        return app('Modules\Gallery\Repositories\GalleryRepository')->find($id);
    });
    $router->get('galleries', [
        'as' => 'admin.gallery.gallery.index',
        'uses' => 'GalleryController@index',
        'middleware' => 'can:gallery.galleries.index'
    ]);
    $router->get('galleries/create', [
        'as' => 'admin.gallery.gallery.create',
        'uses' => 'GalleryController@create',
        'middleware' => 'can:gallery.galleries.create'
    ]);
    $router->post('galleries', [
        'as' => 'admin.gallery.gallery.store',
        'uses' => 'GalleryController@store',
        'middleware' => 'can:gallery.galleries.store'
    ]);
    $router->get('galleries/{gallery}/edit', [
        'as' => 'admin.gallery.gallery.edit',
        'uses' => 'GalleryController@edit',
        'middleware' => 'can:gallery.galleries.edit'
    ]);
    $router->put('galleries/{gallery}', [
        'as' => 'admin.gallery.gallery.update',
        'uses' => 'GalleryController@update',
        'middleware' => 'can:gallery.galleries.update'
    ]);
    $router->delete('galleries/{gallery}', [
        'as' => 'admin.gallery.gallery.destroy',
        'uses' => 'GalleryController@destroy',
        'middleware' => 'can:gallery.galleries.destroy'
    ]);
// append

});
