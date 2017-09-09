<?php

function get_galleries($slideshow = null,$limit = null){

	if($slideshow == 1)
	{
	    if($limit == null)
            return Modules\Gallery\Entities\Gallery::where('slideshow',1)->get();
		return Modules\Gallery\Entities\Gallery::where('slideshow',1)->paginate($limit);
	}
	if($limit == null)
	    return Modules\Gallery\Entities\Gallery::all();
    return Modules\Gallery\Entities\Gallery::paginate($limit);
}
function get_gallery_tags(){
    return Modules\Gallery\Entities\Gallery::groupBy('tag')->get();
}

function gallery_image($gallery,$size = null){

	if($size == null){
		return url($gallery->files ? $gallery->files[0]->path : '');	
	}else{
		return Imagy::getThumbnail($gallery->files ? $gallery->files[0]->path : '', $size);
	}
	
}