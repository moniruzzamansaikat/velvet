@extends('admin.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-3">
    <h3 class="mb-3 text-xl">@lang('Edit User')</h3>

    <x-button href="{{ route('admin.user.list') }}">
        <x-icons.back-v1 />
        @lang('Back')
    </x-button>
</div>

<div class="card">
    
    <div class="card-body">

        <form action="{{ route('admin.user.save', $user->id) }}" method="POST">
            @csrf 
            
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="name" class="form-label">@lang('Name')</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" placeholder="@lang('Enter name')" name="name" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="username" class="form-label">@lang('Username')</label>
                        <input type="text" class="form-control" value="{{ $user->username }}" placeholder="@lang('Enter username')" name="username" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="email" class="form-label">@lang('Email')</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" placeholder="@lang('Enter email address')" name="email" />
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