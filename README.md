Image module for Anax
========================
[![Build Status](https://travis-ci.org/grishazmeypro/Anax-Image.svg?branch=master)](https://travis-ci.org/grishazmeypro/Anax-Image)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/grishazmeypro/Anax-Image/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/grishazmeypro/Anax-Image/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/grishazmeypro/Anax-Image/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/grishazmeypro/Anax-Image/?branch=master)
Getting started
------------------
In order to use this module you have to copy Image folder into your "src" directory. Then you should create "img" and "cache" folders in your webroot directory, also don't forget to set permission for cache folder to 777. Default directory for images is webroot/img and I would not recomend to change it since there is two links that has to point in the same folder, one for Image class and one for HTML output.
Usage
-------

Here is the small example of ImageController usage, you have to define width and height and a image name that you want to scale.
<code>
	$di->set('ImageController', function() use ($di) {
	    $controller = new \Anax\Image\ImageController();
	    $controller->setDI($di);
	    return $controller;
	});
	
	$link = "test.jpg";
	$width = 240;
	$height = 300;
	
	$image = $app->dispatcher->forward([
		'controller' => 'image',
		'action'     => 'show',
		'params'	 => [$link,$width,$height],
	]);
	
	$app->views->addString($image);
<code/>
