<?php

function get_galleries($slideshow = null,$limit = null, $options = []){

    $gallery = new Modules\Gallery\Entities\Gallery;

    if(array_key_exists('tags',$options)){
        $gallery = $gallery->where('tag',$options['tags']);
    }
	if($slideshow == 1)
	{
	    if($limit == null)
            return $gallery->where('slideshow',1)->get();
		return $gallery->where('slideshow',1)->paginate($limit);
	}

	if($limit == null)
	    return $gallery->get();

    return $gallery->paginate($limit);
}
function get_home_galleries($limit = 12){
  $gallery = new Modules\Gallery\Entities\Gallery;
  $first = $gallery->limit($limit);
  $galleries = $gallery
                ->where('tag', '!=', 'Award')
                ->groupBy('tag')
                ->union($first)
                ->limit($limit)
                ->get();
  return $galleries;
}

function get_gallery_tags(){
    return Modules\Gallery\Entities\Gallery::orderBy('tag')->groupBy('tag')->get();
}

function gallery_image($gallery,$size = null){

	if($size == null){
		return url($gallery->files ? $gallery->files[0]->path : '');
	}else{
		return Imagy::getThumbnail($gallery->files ? $gallery->files[0]->path : '', $size);
	}

}
