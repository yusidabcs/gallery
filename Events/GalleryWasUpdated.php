<?php namespace Modules\Gallery\Events;

class GalleryWasUpdated
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var int
     */
    public $galleryId;
    public function __construct($galleryId, array $data)
    {
        $this->data = $data;
        $this->galleryId = $galleryId;
    }
}