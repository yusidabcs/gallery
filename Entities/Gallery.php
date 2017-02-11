<?php namespace Modules\Gallery\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Gallery extends Model
{
	use MediaRelation;
    use Translatable;

    protected $table = 'gallery__galleries';

    public $translatedAttributes = [
        'title',
        'description',

    ];
    protected $fillable = [

        'url',
        'target',

        'title',
        'description'

    ];
    public $timestamps = false;
}
