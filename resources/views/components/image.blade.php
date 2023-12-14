@props(['item'=>null, 'size'=>80, 'float'=>''])

<img src="{{$item->image ? Storage::url('public/'.$item->image->url) : asset('no-image.png')}}"
width="{{$size}}" {{$attributes->merge(['class'=>"rounded $float"])}}>
