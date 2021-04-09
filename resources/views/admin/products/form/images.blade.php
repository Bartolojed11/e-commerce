<product-template inline-template>
    <product-images inline-template>
        <div>
            <vue-dropzone
            @vdropzone-sending="sendingEvent"
            @vdropzone-files-added="fileAdded = true"
            ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
            
            @if(isset($product->product_id))
                <a v-if="fileAdded" href="{{ route('admin.product.image.view', ['product' => $product->product_id]) }}"
                class="btn btn-primary m-top-20px">Done</a>
            @endif

            <div class="container flex">
               @isset($product->media)
                    @foreach ($product->media as $media)
                        <div class="img-display h-100 w-100 m-10-all">
                            <img class="b-5-radius"
                            src="{{ asset($media->path) }}" alt="{{ $media->name }}">
                            <span>
                                <delete-modal :item-id="{{ $media->image_id }}"
                                    :route="'{{ route('admin.product.image.remove', ['image' => $media->image_id]) }}'">
                                    <template v-slot:btn-slot>
                                        <i class="fas fa-times-circle"></i>
                                    </template>
                                </delete-modal>
                                {{-- <button class="btn btn-danger" v-on:click="">
                                    <i class="fas fa-times-circle"></i>
                                </button> --}}
                            </span>
                        </div>
                    @endforeach
               @endisset
            </div>

            {{-- onclick="console.log('{{ $media->image_id }}')" --}}
            <script type="application/json" ref="productId">
                {!! json_encode($product->product_id ?? '') !!}
            </script>
        </div>
    </product-images>
</product-template>