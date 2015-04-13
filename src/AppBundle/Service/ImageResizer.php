<?php



namespace AppBundle\Service;


use abeautifulsite\SimpleImage;

class ImageResizer {

    function __construct()
    {
    }

    public function generateSmallerImages($image){
        $img = new SimpleImage($image->getPathToFile("originals").DIRECTORY_SEPARATOR.$image->getFilename());
        $img->best_fit(600,600)->save($image->getPathToFile("mediums").DIRECTORY_SEPARATOR.$image->getFilename());

        $img->thumbnail(60)->save($image->getPathToFile("thumbnails/color").DIRECTORY_SEPARATOR.$image->getFilename(),100);
        $img->thumbnail(60)->desaturate()->save($image->getPathToFile("thumbnails/bw").DIRECTORY_SEPARATOR.$image->getFilename(),100);
    }
}