<?php

function get_galleries(){
	$galleries = Modules\Gallery\Entities\Gallery::all();
	return $galleries;
}

function gallery_image($gallery,$size = null){

	if($size == null){
		return url($gallery->files ? $gallery->files[0]->path : '');	
	}else{
		return Imagy::getThumbnail($gallery->files ? $gallery->files[0]->path : '', $size);
	}
	
}