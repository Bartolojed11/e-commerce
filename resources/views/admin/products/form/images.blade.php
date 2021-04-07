<product-template inline-template>
    <product-images inline-template>
        <div>
            <vue-dropzone
            @vdropzone-sending="sendingEvent"
            @vdropzone-files-added="fileAdded = true"
            ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
           
            <a v-if="fileAdded" href="{{ route('admin.product.image.view', ['product' => $product->product_id]) }}"
            class="btn btn-primary m-top-20px">Done</a>
            

            <div class="container">
               @isset($product->media)
                    @foreach ($product->media as $media)
                        <img style="margin: 10px"
                        src="{{ asset($media->path) }}" alt="{{ $media->name }}" height="100px" width="100px">
                    @endforeach
               @endisset
            </div>

            <script type="application/json" ref="productId">
                {!! json_encode($product->product_id ?? '') !!}
            </script>
        </div>
    </product-images>
</product-template>