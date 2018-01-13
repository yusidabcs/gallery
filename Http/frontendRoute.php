<?php

use Illuminate\Routing\Router;


  $router->get('image-gallery', [
      'uses' => 'PublicController@image',
      'as' => 'gallery.image'
  ]);
