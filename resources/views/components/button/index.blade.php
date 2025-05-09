@php
    $tag = 'button';
    
    if(isset($attributes['href'])) $tag = 'a';
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => 'btn btn-outline-info v2-btn']) }}>
    {{ $slot }}
</{{ $tag }}>
