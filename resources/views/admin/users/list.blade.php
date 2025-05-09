@extends('admin.layouts.app')

@section('content')
    <div class="mb-3 d-flex justify-content-between">
        <h3>@lang('User List')</h3>

        <div class="d-flex align-items-center gap-2">
            <x-admin-search />
            <x-button href="{{ route('admin.user.new') }}">
                <x-icons.add />
                @lang('Add New')
            </x-button>
        </div>
    </div>


    <div class="card table-card">
        <div class="card-body">
            <!-- start a table -->
            <div class="table-responsive">
                <x-table>
                    <thead class="text-left">
                        <tr>
                            <th>@lang('User')</th>
                            <th>@lang('Email/Phone')</th>
                            <th>@lang('Balance')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Joined At')</th>
                            <th class="text-end">@lang('Action')</th>
                        </tr>
                    </thead>
                    <!-- end table head -->

                    <tbody class="text-left text-gray-600">

                        @foreach ($users as $user)
                            <tr>
                                <x-table.body.cell>
                                    <div class="table-image-cell">
                                        <img src="{{ asset('assets/admin/images/user2.jpg') }}" class="img-fluid" />
                                        <div>
                                            <p class="m-0">{{ $user->name }}</p>
                                            <small>{{ '@' . $user->username }}</small>
                                        </div>
                                    </div>
                                </x-table.body.cell>

                                <x-table.body.cell>
                                    {{ $user->email }}
                                    / {{ $user->phone ?? 'N/A' }}
                                </x-table.body.cell>

                                <x-table.body.cell>
                                    {{ $user->balance }}
                                </x-table.body.cell>

                                <x-table.body.cell>
                                    @php
                                        echo $user->statusBadge;
                                    @endphp
                                </x-table.body.cell>

                                <x-table.body.cell>
                                    {{ $user->created_at }}
                                </x-table.body.cell>


                                <x-table.body.cell class="text-end">
                                    <x-button href="{{ route('admin.user.edit', $user->id) }}" class="btn-sm">
                                        <x-icons.edit />
                                        @lang('Edit')</a>
                                    </x-button>

                                    <x-button href="{{ route('admin.user.edit', $user->id) }}" class="btn-danger btn-sm">
                                        <x-icons.delete-v2 />
                                        @lang('Delete')</a>
                                    </x-button>
                                </x-table.body.cell>
                            </tr>
                        @endforeach


                    </tbody>

                </x-table>
            </div>
            <!-- end a table -->
        </div>

    </div>
@endsection


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
