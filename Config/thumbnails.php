<?php
return [
   
   'galleryThumb' => [
        'resize' => [
            'width' => 300,
            'height' => 250,
            'callback' => function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            },
        ],
    ],
    'galleryNormalThumb' => [
        'resize' => [
            'width' => 700,
            'height' => null,
            'callback' => function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            },
        ],
    ],
];