@extends('admin.layouts.app')

@section('content')

@php

$admin = auth('admin')->user();

@endphp


<div class="row">
    <div class="col-lg-4">

        <div class="card">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>@lang('Name')</strong>
                        <span>{{ $admin->name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>@lang('Username')</strong>
                        <span>{{ $admin->username }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>@lang('Email')</strong>
                        <span>{{ $admin->email }}</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="col-lg-8">
        <form action="{{ route('admin.setting.profile.update') }}" method="POST">
            @csrf 
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">@lang('Name')</label>
                        <input type="text" class="form-control" value="{{ $admin->name }}" placeholder="@lang('Enter your name')" name="name" />
                    </div>

                    <div class="form-group mt-3">
                        <label for="name" class="form-label">@lang('Email')</label>
                        <input type="text" class="form-control" value="{{ $admin->email }}" placeholder="@lang('Enter your email')" name="email" />
                    </div>

                    <div class="d-flex mt-3 justify-content-end">
                        <button type="submit" class="btn">@lang('Submit')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection