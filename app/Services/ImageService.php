<?php


namespace App\Services;


use App\Models\Image\Image;

use App\Models\Product\Product;
use App\Models\Product\ProductImage;


use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\size;

class ImageService
{
//    upload one image
    public function uploadImage(Request $request)
    {
        $image = $request->file('image');
        $path = $image->store('images', 'my_files');
        return Image::create([
            'path' => $path
        ]);
    }

// upload multiple image for products
    public function uploadProductImage(Request $request, $id)
    {
        $files = $request->file('images');
        foreach ($files as $image) {
//            $name = $image->hashName();
            $path = $image->store('ProductsImage', 'my_files');
            ProductImage::create([
                'product_id' => $id,
                'path' => $path
            ]);
        }

    }

    public function showImage($filename)
    {
        $path = storage_path('app/public/' . $filename);
        return response()->file($path);
    }


    public function deleteImage($filename)
    {
        Storage::delete('app/public/' . $filename);
    }
}
