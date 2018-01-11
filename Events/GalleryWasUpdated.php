<?php namespace Modules\Gallery\Events;

use Modules\Media\Contracts\StoringMedia;

class GalleryWasUpdated implements StoringMedia
{
    private $gallery;
    private $data;

    public function __construct($gallery, $data)
    {
        $this->gallery = $gallery;
        $this->data = $data;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->gallery;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}