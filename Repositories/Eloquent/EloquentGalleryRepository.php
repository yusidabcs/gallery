<?php namespace Modules\Gallery\Repositories\Eloquent;

use Modules\Gallery\Repositories\GalleryRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Gallery\Events\GalleryWasCreated;
use Modules\Gallery\Events\GalleryWasUpdated;
use Modules\Gallery\Events\GalleryWasDeleted;

class EloquentGalleryRepository extends EloquentBaseRepository implements GalleryRepository
{

	public function all()
	{
		return $this->model->all();
	}
	public function create($data)
    {
        $gallery = $this->model->create($data);
        event(new GalleryWasCreated($gallery, $data));
        return $gallery;
    }

    public function update($model, $data)
    {
        $model->update($data);

        event(new GalleryWasUpdated($model->id, $data));

        return $model;
    }

    public function destroy($model)
    {
        event(new GalleryWasDeleted($model->id, get_class($model)));

        return $model->delete();
    }

    public function first(){
        return $this->model->first();
    }
}
