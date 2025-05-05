@extends('admin.layouts.app')

@section('content')
    <div class="card">

        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="font-bold text-lg">@Lang('User List')</h2>

                <x-admin-search />
            </div>

            <!-- start a table -->
            <table class="table-fixed w-full">

                <!-- table head -->
                <thead class="text-left">
                    <tr>
                        <th class="w-1/2 pb-10 text-sm font-extrabold tracking-wide">@lang('User')</th>
                        <th class="w-1/2 pb-10 text-sm font-extrabold tracking-wide">@lang('Email/Phone')</th>
                        <th class="w-1/2 pb-10 text-sm font-extrabold tracking-wide">@lang('Balance')</th>
                        <th class="w-1/2 pb-10 text-sm font-extrabold tracking-wide">@lang('Status')</th>
                        <th class="w-1/2 pb-10 text-sm font-extrabold tracking-wide">@lang('Joined At')</th>
                        <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">@lang('Action')</th>
                    </tr>
                </thead>
                <!-- end table head -->

                <!-- table body -->
                <tbody class="text-left text-gray-600">

                    <!-- item -->
                    <tr>
                        <!-- name -->
                        <td class="w-1/2 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                            <div class="w-8 h-8 overflow-hidden rounded-full">
                                <img src="{{ asset('assets/admin/images/user2.jpg') }}" class="object-cover">
                            </div>
                            <p class="ml-3 name-1">Franciszek</p>
                        </td>
                        <!-- name -->

                        <td>ok</td>

                        <!-- product -->
                        <td>Nike Sport</th>
                        <!-- product -->

                        <!-- invoice -->
                        <td>#<span
                                class="num-4">5203</span></td>
                        <!-- invoice -->

                        <!-- price -->
                        <td>$<span
                                class="num-2">32</span></td>
                        <!-- price -->


                        <td class="text-end">
                            <a href="" class="btn btn-sm">@lang('Edit')</a>
                        </td>

                    </tr>
                    <!-- item --> 


                </tbody>
                <!-- end table body -->

            </table>
            <!-- end a table -->
        </div>

    </div>
@endsection
