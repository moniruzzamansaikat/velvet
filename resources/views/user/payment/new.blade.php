@extends('user.layouts.main')


@section('content')
    <h1>Make A Payment</h1>


    <div class="card">
        <div class="card-body">
            
            <form action="{{ route('user.payment.insert') }}" method="POST">
                @csrf 
                
                @foreach ($paymentGateways as $gateway)
                    <label class="payment-gateway-item" for="{{ $gateway->name.'-'.$loop->index }}">
                        <img class="img-fluid" src="{{ asset('storage/' . $gateway->image) }}" />
                        <strong>{{ $gateway->name }}</strong>
                        <input type="radio" name="payment_gateway_id" id="{{ $gateway->name.'-'.$loop->index }}" value="{{ $gateway->id }}">
                        {{ $gateway->name }}
                    </label>
                @endforeach

                <input type="number" step="0.01" name="amount" />
                
                <button type="submit">@lang('Submit')</button>
                
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .payment-gateway-item {
            background-color: #f0f0f0;
        }
    </style>
@endpush