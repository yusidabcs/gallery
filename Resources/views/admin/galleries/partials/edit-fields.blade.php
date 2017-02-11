<div class="box-body">
    @include('media::admin.fields.file-link', [
	    'entityClass' => 'Modules\\\\Gallery\\\\Entities\\\\Gallery',
	    'entityId' => $g->id,
	    'zone' => 'gallery'
	])
</div>
