<?php

namespace App\Traits;

use Illuminate\Support\Str;
// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

trait ImageProcessing
{
    public function path( $folder, $folder2 = null)
    {
        $path = public_path() . '/files' . '/' . $folder . '/' ;
        if ($folder2 != null) {

            $path =  $path . '/' .  $folder2 . '/';
        }
        if (!File::exists($path)) {
            mkdir($path, 0777, true);
        }
        return  $path;
    }
    public function get_mime($mime)
    {
        if ($mime == 'image/png')
            $extension = '.png';
        elseif($mime == 'image/jpeg')
            $extension = '.jpg';
        elseif ($mime == 'image/gif')
            $extension = '.gif';
        elseif ($mime == 'image/svg+xml')
            $extension = '.svg';
        elseif ($mime == 'image/tiff')
            $extension = '.tiff';
        elseif ($mime == 'image/webp')
            $extension = '.webp';

        return $extension;
    }
    public function saveImage($image, $folder, $folder2 = null)
    {
        $img = Image::make($image);
        $extension = $this->get_mime($img->mime());

        $str_random = Str::random(4);
        $imgpath = $str_random . time() . $extension;
        $img->save($this->path($folder, $folder2) .  $imgpath);

        return $imgpath;
    }
    public function aspect4resize($image, $width, $height, $folder ,$folder2=null)
    {
        $img = Image::make($image);
        $extension = $this->get_mime($img->mime());
        $str_random = Str::random(4);

        $img->resize($width, $height);


        $imgpath = $str_random . time() . $extension;
        $img->save($this->path($folder, $folder2)  .  $imgpath);
        // $img->save(storage_path('app/imagesfp') . '/' . $imgpath);

        return $imgpath;
    }
    public function aspect4height($image, $width, $height)
    {
        $img = Image::make($image);
        $extension = $this->get_mime($img->mime());
        $str_random = Str::random(8);
        $img->resize(null, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

        if ($img->width() < $width) {
            $img->resize($width, null);
        } else if ($img->width() > $width) {
            $img->crop($width, $height, 0, 0);
        }

        $imgpath = $str_random . time() . $extension;
        $img->save(storage_path('app/imagesfp') . '/' . $imgpath);
        return $imgpath;
    }
    public function saveImageAndThumbnail($Thefile, $thumb = false,  $folder = 'course', $folder2 = null, $height = null, $width = null)
    {
        $dataX = array();
        if ($height != null && $width != null) {

            $dataX['image'] = $this->aspect4resize($Thefile,  $width , $height,  $folder, $folder2);
        } else {
            $dataX['image'] = $this->saveImage($Thefile,  $folder, $folder2);
        }

        if ($thumb) {
            $dataX['thumbnailsm'] = $this->aspect4resize($Thefile, 256, 144,  $folder, $folder2);
            $dataX['thumbnailmd'] = $this->aspect4resize($Thefile, 426, 240,  $folder, $folder2);
            $dataX['thumbnailxl'] = $this->aspect4resize($Thefile, 640, 360,  $folder, $folder2);
        }

        return $dataX;
    }
    public function deleteImage($filePath)
    {
        if ($filePath) {
            if (is_file(public_path()::disk('imagesfp')->path($filePath))) {
                if (file_exists(public_path()::disk('imagesfp')->path($filePath))) {
                    unlink(public_path()::disk('imagesfp')->path($filePath));
                }
            }
        }
    }


    public function uploadfile($file, $course_id=null, $folder=null, $folder2=null)
    {


    }
    public function applyWatermark($imgewatermark, $imageorginal)
    {
        // $p1 = public_path('\files\1.jpg');
        // $p2 = public_path('\files\watermark.png');

        $watermark = Image::make($imgewatermark);
        $watermark->rotate(45);

        $image = Image::make($imageorginal);
        $image->greyscale();
        // $image->blur(18);

        // $imageWidth = $image->width();
        // $imageHeight = $image->height();
        // $positionX = ($imageWidth - $watermark->width()) / 2;
        // $positionY = ($imageHeight - $watermark->height()) / 2;
        // // $image->insert($imgewatermark, 'center',  number_format($positionX),  number_format($positionY));
        $image->insert($watermark, 'center');
        return $image->response('jpg');
    }
}
