<?php namespace Modules\Gallery\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Gallery extends Model
{
	use MediaRelation;

    protected $table = 'gallery__galleries';
    public $translatedAttributes = [];
    protected $fillable = [
    	'gallery'
    ];
    public $timestamps = false;
}
