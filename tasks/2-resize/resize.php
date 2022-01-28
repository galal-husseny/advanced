<?php
// include composer autoload
require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

// create an image manager instance with favored driver
$manager = new ImageManager(['driver' => 'gd']);

// to finally create image instances

$images = scandir('images');
$oldImagesFolder = "images/";
$newImagesFolder = "new_images/";
define('width',100);
define('hieght',100);
foreach ($images as $image) {
    if($image == '.' || $image == '..'){
        continue;
    }
 $manager->make($oldImagesFolder.$image)->resize(width, hieght)->save($newImagesFolder.$image);
}

