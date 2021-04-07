<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\Images as ProductImage;
use Illuminate\Support\Facades\Storage;
use Image;

class ProductImageController extends Controller
{
    private $object = 'product';
    public $page = 'product';

    public function view(Product $product)
    {
        $product->load('inventories');
        $product->load('media');

        $inventory = $product->inventories()->first();
        $page = $this->page;

        $tab = 'images';
        return view('admin.products.form', compact(['product', 'inventory', 'page', 'tab']));
    }

    public function upload(Request $request)
    {
        if ($request->file) {
            foreach($request->file as $file) {
                $imageHash = strtotime(now()) . '_' . $file->hashName();
                $path = 'products/' . $imageHash;

                $width = Image::make($file)->width();
                $height = Image::make($file)->height();

                $img = Image::make($file->getRealPath())->resize($width, $height, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->stream();

                Storage::disk('public')->put($path, $img);

                $img = Image::make($file->getRealPath())->resize(400, 400, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->stream();
                Storage::disk('public')->put("thumbnails/$path", $img);

                // 50x50
                $img = '';
                $img = Image::make($file->getRealPath())->resize(50, 50, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->stream();
                Storage::disk('public')->put("thumbnails/50x50/$path", $img);

                $this->savePath(
                    $path,
                    $imageHash,
                    $file->getClientOriginalName(),
                    $request->object_id
                );

                $img = '';
            }
        }
    }

    public function savePath($path, $imageHash, $filename, $object_id)
    {
        $img = new ProductImage;
        $img->path = $path;
        $img->name = $filename;
        $img->hash = $imageHash;
        $img->object_id = $object_id;
        $img->object = $this->object;
        $img->save();
    }

    public function remove(Request $request)
    {
        Log::debug($request->all());
        Log::info("here");
    }
}
