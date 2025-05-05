@extends('admin.layouts.app')

@section('content')
    <div class="grid grid-cols-5 gap-6 xl:grid-cols-2 mb-5">
        <!-- card -->
        <div class="card mt-6">
            <div class="card-body flex items-center">
                <div class="px-3 py-2 rounded bg-indigo-600 text-white mr-3">
                    <i class="fad fa-users"></i>
                </div>

                <div class="flex flex-col">
                    <h1 class="font-semibold">@lang('Total Users')</h1>
                    <p class="text-xs">{{ $widget['total_users'] }} </p>
                </div>
            </div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="card mt-6">
            <div class="card-body flex items-center">
                <div class="px-3 py-2 rounded bg-green-600 text-white mr-3">
                    <i class="fad fa-shopping-cart"></i>
                </div>

                <div class="flex flex-col">
                    <h1 class="font-semibold">
                        <span class="num-2">85</span> Orders
                    </h1>
                    <p class="text-xs"><span class="num-2">51</span> items</p>
                </div>
            </div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="card mt-6 xl:mt-1">
            <div class="card-body flex items-center">
                <div class="px-3 py-2 rounded bg-yellow-600 text-white mr-3">
                    <i class="fad fa-blog"></i>
                </div>

                <div class="flex flex-col">
                    <h1 class="font-semibold"><span class="num-2">30</span> posts</h1>
                    <p class="text-xs"><span class="num-2">42</span> active</p>
                </div>
            </div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="card mt-6 xl:mt-1">
            <div class="card-body flex items-center">
                <div class="px-3 py-2 rounded bg-red-600 text-white mr-3">
                    <i class="fad fa-comments"></i>
                </div>

                <div class="flex flex-col">
                    <h1 class="font-semibold">
                        <span class="num-2">88</span> comments
                    </h1>
                    <p class="text-xs"><span class="num-2">96</span> approved</p>
                </div>
            </div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="card mt-6 xl:mt-1 xl:col-span-2">
            <div class="card-body flex items-center">
                <div class="px-3 py-2 rounded bg-pink-600 text-white mr-3">
                    <i class="fad fa-user"></i>
                </div>

                <div class="flex flex-col">
                    <h1 class="font-semibold">
                        <span class="num-2">59</span> memebrs
                    </h1>
                    <p class="text-xs"><span class="num-2">75</span> online</p>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>



    <div class="grid grid-cols-4 gap-6 xl:grid-cols-1">
        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    <!-- top -->
                    <div class="flex flex-row justify-between items-center">
                        <div class="h6 text-indigo-700 fad fa-shopping-cart"></div>
                        <span class="rounded-full text-white badge bg-teal-400 text-xs">
                            12%
                            <i class="fal fa-chevron-up ml-1"></i>
                        </span>
                    </div>
                    <!-- end top -->

                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5 num-4"></h1>
                        <p>total users</p>
                    </div>
                    <!-- end bottom -->
                </div>
            </div>
            <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    <!-- top -->
                    <div class="flex flex-row justify-between items-center">
                        <div class="h6 text-red-700 fad fa-store"></div>
                        <span class="rounded-full text-white badge bg-red-400 text-xs">
                            6%
                            <i class="fal fa-chevron-down ml-1"></i>
                        </span>
                    </div>
                    <!-- end top -->

                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5 num-4"></h1>
                        <p>new orders</p>
                    </div>
                    <!-- end bottom -->
                </div>
            </div>
            <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    <!-- top -->
                    <div class="flex flex-row justify-between items-center">
                        <div class="h6 text-yellow-600 fad fa-sitemap"></div>
                        <span class="rounded-full text-white badge bg-teal-400 text-xs">
                            72%
                            <i class="fal fa-chevron-up ml-1"></i>
                        </span>
                    </div>
                    <!-- end top -->

                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5 num-4"></h1>
                        <p>total Products</p>
                    </div>
                    <!-- end bottom -->
                </div>
            </div>
            <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    <!-- top -->
                    <div class="flex flex-row justify-between items-center">
                        <div class="h6 text-green-700 fad fa-users"></div>
                        <span class="rounded-full text-white badge bg-teal-400 text-xs">
                            150%
                            <i class="fal fa-chevron-up ml-1"></i>
                        </span>
                    </div>
                    <!-- end top -->

                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5 num-4"></h1>
                        <p>new Visitor</p>
                    </div>
                    <!-- end bottom -->
                </div>
            </div>
            <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>
        <!-- end card -->
    </div>




    <div class="grid grid-cols-5 gap-5 mt-5 lg:grid-cols-2">

        <!-- status -->
        <div class="card col-span-1">
            <div class="card-body">
                <h5 class="uppercase text-xs tracking-wider font-extrabold">today</h5>
                <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">813</span> <span
                        class="text-xs tracking-widest font-extrabold"> / <span class="num-2">36</span> orders</span></h1>
                <p class="capitalize text-xs text-gray-500">( $<span class="num-2">4</span> in the last year )</p>
            </div>
        </div>
        <!-- status -->

        <!-- status -->
        <div class="card col-span-1">
            <div class="card-body">
                <h5 class="uppercase text-xs tracking-wider font-extrabold">yesterday</h5>
                <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">270</span> <span
                        class="text-xs tracking-widest font-extrabold"> / <span class="num-2">41</span> orders</span>
                </h1>
                <p class="capitalize text-xs text-gray-500">( $<span class="num-2">15</span> in the last year )</p>
            </div>
        </div>
        <!-- status -->

        <!-- status -->
        <div class="card col-span-1">
            <div class="card-body">
                <h5 class="uppercase text-xs tracking-wider font-extrabold">last week</h5>
                <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">490</span> <span
                        class="text-xs tracking-widest font-extrabold"> / <span class="num-2">30</span> orders</span>
                </h1>
                <p class="capitalize text-xs text-gray-500">( $<span class="num-2">76</span> in the last year )</p>
            </div>
        </div>
        <!-- status -->

        <!-- status -->
        <div class="card col-span-1">
            <div class="card-body">
                <h5 class="uppercase text-xs tracking-wider font-extrabold">last month</h5>
                <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">720</span> <span
                        class="text-xs tracking-widest font-extrabold"> / <span class="num-2">61</span> orders</span>
                </h1>
                <p class="capitalize text-xs text-gray-500">( $<span class="num-2">55</span> in the last year )</p>
            </div>
        </div>
        <!-- status -->

        <!-- status -->
        <div class="card col-span-1 lg:col-span-2">
            <div class="card-body">
                <h5 class="uppercase text-xs tracking-wider font-extrabold">last 90-days</h5>
                <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">883</span> <span
                        class="text-xs tracking-widest font-extrabold"> / <span class="num-2">90</span> orders</span>
                </h1>
                <p class="capitalize text-xs text-gray-500">( $<span class="num-2">89</span> in the last year )</p>
            </div>
        </div>
        <!-- status -->


    </div>
@endsection
