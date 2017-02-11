<?php namespace Modules\Gallery\Events;

use Modules\Media\Contracts\DeletingMedia;

class GalleryWasDeleted implements DeletingMedia
{
    /**
     * @var string
     */
    private $galleryClass;
    /**
     * @var int
     */
    private $galleryId;
    public function __construct($galleryId, $galleryClass)
    {
        $this->galleryClass = $galleryClass;
        $this->galleryId = $galleryId;
    }
    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->galleryId;
    }
    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return $this->galleryClass;
    }
}