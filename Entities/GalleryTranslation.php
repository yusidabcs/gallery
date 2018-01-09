<?php
/**
 * Created by PhpStorm.
 * User: yusida
 * Date: 2/11/17
 * Time: 10:36 PM
 */
namespace Modules\Gallery\Entities;


use Illuminate\Database\Eloquent\Model;

class GalleryTranslation extends Model
{
    protected $table = 'gallery__gallery_translations';
    public $timestamps = false;
    protected $fillable = [

        'title',
        'description',
        'tags'
    ];

}