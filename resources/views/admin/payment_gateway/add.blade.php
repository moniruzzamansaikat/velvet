@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-3">@lang('Add New Payment Gateway')</h3>

    <x-button href="{{ route('admin.payment_gateway.list') }}">
        <x-icons.back-v1 />
        @lang('Back')
    </x-button>
</div>

<div class="card">
    
    <div class="card-body">

        <form action="{{ route('admin.payment_gateway.save') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="image" class="form-label">@lang('Image')</label>
                        <input type="file" class="form-control" value="{{ old('image') }}" name="image" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="name" class="form-label">@lang('Name')</label>
                        <input type="text" class="form-control" value="{{ old('name') }}" placeholder="@lang('Enter name')" name="name" />
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="stripe_key" class="form-label">@lang('Stripe Key')</label>
                        <input type="text" class="form-control" value="{{ old('stripe_key') }}" placeholder="@lang('Enter stripe public key')" name="stripe_key" />
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="stripe_secret" class="form-label">@lang('Stripe Secret')</label>
                        <input type="text" class="form-control" value="{{ old('stripe_secret') }}" placeholder="@lang('Enter stripe secret')" name="stripe_secret" />
                    </div>
                </div>
                
            </div>

            <div class="d-flex justify-content-end mt-4">
                <x-button type="submit">
                    <x-icons.save />
                    @lang('Save')
                </x-button>
            </div>


        </form>

    </div>
</div>

@endsection