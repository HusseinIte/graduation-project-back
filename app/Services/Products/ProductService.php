<?php


namespace App\Services\Products;


use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product\DeviceAttribute;
use App\Models\Product\FrameAttribute;
use App\Models\Product\LensesAttribute;
use App\Models\Product\Product;
use App\Models\Product\ProductAttribute;
use App\Services\ImageService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Image\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class ProductService
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function getAllProduct()
    {

        return ProductResource::collection(Product::all());
    }

    public function getProductById($id)
    {
        return new ProductResource(Product::find($id));
    }

    public function getOneImageProduct($id)
    {
        $product = Product::find($id);
        $image = $product->images->first();
        return $this->imageService->showImage($image->path);

    }

    public function storeProduct($data, $category_id)
    {
        return Product::create([
            'category_id' => $category_id,
            'numberModel' => $data->numberModel,
            'manufactureCompany' => $data->manufactureCompany,
            'amount' => $data->amount,
            'price' => $data->price,
            'alertAmount' => $data->alertAmount,
        ]);
    }

    public function storeFrameAttributes($data, $product_id)
    {
        return FrameAttribute::create([
            'product_id' => $product_id,
            'frameType' => $data->frameType,
            'size' => $data->size,
            'arm' => $data->arm,
            'bridge' => $data->bridge,
            'frameShape' => $data->frameShape,
            'frameClass' => $data->frameClass,
            'color' => $data->color
        ]);

    }

    public function storeDeviceAttributes($data, $product_id)
    {
        return DeviceAttribute::create([
            'product_id' => $product_id,
            'details' => $data->details
        ]);

    }

    public function storeLensesAttributes($data, $product_id)
    {
        return LensesAttribute::create([
            'product_id' => $product_id,
            'spherical' => $data->spherical,
            'cylinder' => $data->cylinder,
            'lensesClass' => $data->lensesClass,
            'classType' => $data->classType
        ]);

    }

    public function storeDevice(Request $request)
    {
        $jsonData = $request->input('data');
        $data = json_decode($jsonData);
        try {
            $product = $this->storeProduct($data, 2);
        } catch (QueryException $e) {
            $errorMessage = 'هذا المنتج موجود بالفعل';
            return response()->json([
                'status' => 'failed',
                'message' => $errorMessage]);
        }
        $this->storeDeviceAttributes($data, $product->id);
        $this->imageService->uploadProductImage($request, $product->id);
        return response()->json([
            'status' => 'success',
            'message' => 'تم حفظ الجهاز بنجاح '
        ]);

    }

    public function storeLenses(Request $request)
    {

        $jsonData = $request->input('data');
        $data = json_decode($jsonData);
        try {
            $product = $this->storeProduct($data, 3);
        } catch (QueryException $e) {
            $errorMessage = 'هذا المنتج موجود بالفعل';
            return response()->json([
                'status' => 'failed',
                'message' => $errorMessage]);
        }
        $this->storeLensesAttributes($data, $product->id);
        $this->imageService->uploadProductImage($request, $product->id);
        return response()->json([
            'status' => 'success',
            'message' => 'تم حفظ العدسة بنجاح '
        ]);
    }

    public function storeFrame(Request $request)
    {
        $jsonData = $request->input('data');
        $data = json_decode($jsonData);
        try {
            $product = $this->storeProduct($data, 1);
        } catch (QueryException $e) {
            $errorMessage = 'هذا المنتج موجود بالفعل';
            return response()->json([
                'status' => 'failed',
                'message' => $errorMessage]);
        }
        $this->storeFrameAttributes($data, $product->id);
        $this->imageService->uploadProductImage($request, $product->id);
        return response()->json([
            'status' => 'success',
            'message' => 'تم حفظ الإطار بنجاح '
        ]);
    }


    public function deletePrudoct($Prudoct_id)
    {
        $product = Product::find($Prudoct_id);
        if($product->category_id==1)
        {
            $frameAttribute=$product->frameAttribute;
            $frameAttribute->delete();
            $images=$product->images;
            if(count($images)>0)
            {
                foreach ($images as $image) 
                {
                    $filename=$image->path;
                    $path = storage_path('app/public/' . $filename);
                    if(is_file($path))
                    {
                        unlink($path);
                    }
                    $image->delete();
                }
            }
            $product->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'تم حذف الإطار بنجاح '
            ]);
        }
        elseif($product->category_id==2)
        {
            $device_attribute=$product->deviceAttribute;
            $device_attribute->delete();
            $images=$product->images;
            if(count($images)>0)
            {
                foreach ($images as $image) 
                {
                    $filename=$image->path;
                    $path = storage_path('app/public/' . $filename);
                    if(is_file($path))
                    {
                        unlink($path);
                    }
                    $image->delete();
                }
            }
            $product->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'تم حذف الجهاز بنجاح '
            ]);
        }
        elseif($product->category_id==3)
        {
            $lenses_attribute=$product->lensesAttribute;
            $lenses_attribute->delete();
            $images=$product->images;
            if(count($images)>0)
            {
                foreach ($images as $image) 
                {
                    $filename=$image->path;
                    $path = storage_path('app/public/' . $filename);
                    if(is_file($path))
                    {
                        unlink($path);
                    }
                    $image->delete();
                }
            }
            $product->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'تم حذف العدسة بنجاح '
            ]);
        }
        
    }

}
