Asgard cms module to create your own gallery

##  Instalation
    composer require bcscoder/gallery

##  Helpers

#####  get_galleries($slideshow,$limit, $options)
To get all the gallery images
Parameter
- $slideshow = slideshow status, default is null
- $limit = how many gallery to take, default is null to return all gallery
- $options : array options
  - tags (string) filter gallery by its tag key

#### get_home_galleries($limit)
To get gallery for homepage.
Parameter
- $limit = show how many galleries are shown, default is 12

#####  get_gallery_tags($gallery)
Helper to get gallery tag, pass gallery object

#####  get_gallery_image($gallery, $thumbnail)
Helper to get gallery image, pass gallery object
- $thumbnail (string) default value is null to get the real size image
