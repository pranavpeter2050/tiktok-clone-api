<?php

namespace App\Services;

// use Image;
use Intervention\Image\Laravel\Facades\Image;

class FileService
{
  public function updateImage($model, $request)
  {
    $image = Image::make($request->file('image'));

    if (!empty($model->image)) {
      $currentImage = public_path() . $model->image;

      if (file_exists($currentImage) && $currentImage != public_path() . '/user-placeholder.png') {
        unlink($currentImage); // "unlink" means delete the file
      }
    }

    $file = $request->file('image');
    $extension = $file->getClientOriginalExtension();

    $image->crop(
      $request->width,
      $request->height,
      $request->left,
      $request->top
    );

    $name = time() . '.' . $extension;
    $image->save(public_path() . '/files/' . $name);
    $model->image = '/files/' . $name;

    return $model;
  }
}