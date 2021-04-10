@if( count($product->media) < 1)
  empty
@else
<div class="container flex">
    @isset($product->media)
        @foreach ($product->media as $media)
            <div class="img-display h-100 w-100 m-10-all">
                <img class="b-5-radius"
                src="{{ asset($media->path) }}" alt="{{ $media->name }}">
            </div>
        @endforeach
    @endisset
</div>
@endif