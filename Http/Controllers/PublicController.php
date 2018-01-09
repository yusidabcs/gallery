<?php
namespace Modules\Gallery\Http\Controllers;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Gallery\Entities\Gallery;
use Illuminate\Http\Request;

/**
 *
 */
class PublicController extends BasePublicController
{
  public function image(Request $request){
      $data = $request->get('tag');
      $gallery = new Gallery;
      if ($data == '')
        $images = $gallery->where('tag', '!=', 'Award')->paginate(12);
      else
        $images = $gallery->where('tag', $data)->paginate(12);

      $rs = [];
      foreach ($images as $key => $image) {
        # code...
        $rs [] = [
          'id' => $image->id,
          'title' => $image->title,
          'slideshow' => $image->slideshow,
          'tag'  => $image->tag,
          'tags' => $image->tags,
          'target' => $image->target,
          'url' => (string)gallery_image($image, 'mediumThumb'),
        ];
      }

      return response()->json($rs);
  }
}
