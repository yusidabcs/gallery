<?php
/**
 * Created by PhpStorm.
 * User: yusida
 * Date: 2/23/17
 * Time: 2:23 PM
 */

namespace Modules\Gallery\Tests;


class GalleryRepositoryTest extends BaseGalleryTest
{
    public function test_it_create_gallery(){
        $gallery = $this->createGallery('_self', 'http://google.com');

        $this->assertEquals(1, $this->gallery->find($gallery->id)->count());
        $this->assertEquals($gallery->name, $this->gallery->find($gallery->id)->name, 'success create gallery with '.$gallery->url);
    }

    public function test_it_delete_gallery(){
        $gallery = $this->createGallery('_self', 'http://google.com');
        $id = $gallery->id;
        $this->gallery->destroy($gallery);
        $this->notSeeInDatabase('gallery__galleries', [
            'id' => $id
        ]);
    }

    public function test_it_success_update_gallery(){
        $gallery = $this->createGallery('_self', 'http://google.com');
        $gallery->url = "http://ngide.net";
        $gallery->save();
        $this->seeInDatabase('gallery__galleries', [
            'id' => $gallery->id,
            'url' => "http://ngide.net"
        ]);
    }
    public function test_it_failed_update_gallery(){
        $gallery = $this->createGallery('_self', 'http://google.com');
        $gallery->url = "http://ngide.net";
        $gallery->save();
        $this->notSeeInDatabase('gallery__galleries', [
            'id' => $gallery->id,
            'url' => 'http://google.com'
        ]);
    }
}