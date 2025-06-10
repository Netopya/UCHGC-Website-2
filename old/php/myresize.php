<?php 

function autoResize($oldWidth, $oldHeight, $newWidth, $newHeight)
{    
    //http://stackoverflow.com/questions/3008772/how-to-smart-resize-a-displayed-image-to-original-aspect-ratio
    
    $original_ratio = $oldWidth / $oldHeight;
    $designer_ratio = $newWidth / $newHeight;
    if ($original_ratio > $designer_ratio)
        $newHeight = $newWidth / $original_ratio;
    else
        $newWidth = $newHeight * $original_ratio;
    
    return array('optimalWidth' => $newWidth, 'optimalHeight' => $newHeight);
}

function resizeImage($originalImage, $outputImage, $quality, $desiredHeight, $desiredWidth)
{
    // jpg, png, gif or bmp?
    $exploded = explode('.',$originalImage);
    $ext = $exploded[count($exploded) - 1]; 

    if (preg_match('/jpg|jpeg/i',$ext))
        $imageTmp=imagecreatefromjpeg($originalImage);
    else if (preg_match('/png/i',$ext))
        $imageTmp=imagecreatefrompng($originalImage);
    else if (preg_match('/gif/i',$ext))
        $imageTmp=imagecreatefromgif($originalImage);
    else if (preg_match('/bmp/i',$ext))
        $imageTmp=imagecreatefrombmp($originalImage);
    else
        return 0;

    $x = getimagesize($originalImage);            
    $width  = $x['0'];
    $height = $x['1'];
    $optimalDimensions = autoResize($width, $height, $desiredWidth, $desiredHeight);
    $rs_width = $optimalDimensions['optimalWidth'];
    $rs_height = $optimalDimensions['optimalHeight'];
    
    $img_base = imagecreatetruecolor($rs_width, $rs_height);
    imagecopyresampled($img_base, $imageTmp, 0, 0, 0, 0, $rs_width, $rs_height, $width, $height);

    // quality is a value from 0 (worst) to 100 (best)
    imagejpeg($img_base, $outputImage, $quality);
    imagedestroy($imageTmp);

    return 1;
}

?>