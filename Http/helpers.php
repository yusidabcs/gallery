<?php

function get_galleries(){
	$galleries = Modules\Gallery\Entities\Gallery::has('files')->get();
	return $galleries;
}

function gallery_image($gallery,$size = null){

	if($size == null){
		return url($gallery->files ? $gallery->files->first()->path : '');
	}else{
		return Imagy::getThumbnail($gallery->files ? $gallery->first()->path : '', $size);
	}
	
}