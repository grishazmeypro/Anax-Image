<?php 
namespace Anax\Image;

class ImageControllerTest extends \PHPUnit_Framework_TestCase
{
	public function testOutputImage()
	{
		
		define('IMG_PATH' ,__DIR__ .DIRECTORY_SEPARATOR.'imgtest'. DIRECTORY_SEPARATOR);
		define('CACHE_PATH' , __DIR__ .DIRECTORY_SEPARATOR);
		$height = 240;
		$width = 300;
		$filename = "test.jpg";
		chmod(IMG_PATH,0777);
		chmod(CACHE_PATH,0777);
		$saveAs = 'jpg';
		$image = new \Anax\Image\Image($filename,$width,$height,$saveAs, true);		
		$image->validate();
		$image->getImageInfo();
		$image->createFilenameForCache();
		$image->openOriginalImage();
		$image->calculateNewImage();
		$image->resizeImage();
	    $image->applyFilters();
	    $image->SaveAs();

		
		$imgInfo = getimagesize($image->getCacheFileName());
		$this->assertEquals($imgInfo[0],300);
		$this->assertEquals(222,$imgInfo[1]);
	}
	
}