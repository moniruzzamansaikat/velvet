@props([
    'striped'    => true,
    'nowrap'     => false,
    'hover'      => true,
    'responsive' => true,
])

@php
    $classes = Arr::toCssClasses([
        'table',
        'table-nowrap'  => $nowrap,
        'table-hover'   => $hover,
        'table-striped' => $striped,
    ]);
@endphp

@if($responsive) <div class="table-responsive"> @endif

<table {{ $attributes->merge(['class' => $classes]) }}>

    {{ $slot }}

</table>

@if($responsive) </div> @endif

@once
    @push('styles')
        <style>
            .table-card {
                border: none;
                border-radius: 4px;
            }
            
            .table-image-cell {
                display: flex;
                align-items: center;
                justify-content: start;
                gap: 10px;
                --square: 40px;
            }

            .table-image-cell img {
                width: var(--square);
                height: var(--square);
                border-radius: 50%;
            }
        </style>
    @endpush
@endonce