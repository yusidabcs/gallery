Module for creating your own gallery image.


##Instalation

composer require bcscoder/gallery

##Available Helpers
- get_galleries($slideshow,$limit,$options[])

pass 1 to slideshow, it will show you gallery for your slider.

- get_home_gallery($limit)

it will list all galleries with limit for each tags.

- get_gallery_tags()

it will list all tags of the gallery

- gallery_image($gallery, $size = null)

it will return the thumbnail of the gallery, and alse you can pass size of thumbnail
