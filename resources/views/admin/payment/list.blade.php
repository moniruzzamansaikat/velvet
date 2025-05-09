@extends('admin.layouts.app')

@section('content')
    <x-base.page-header>
        <x-slot name="title">
            {{ __('Payments') }}
        </x-slot>

        <x-slot name="right">
            <x-admin-search />
        </x-slot>
    </x-base.page-header>

    <x-card class="table-card">

        <x-table>
            <thead class="text-left">
                <tr>
                    <th>@lang('User')</th>
                    <th>@lang('Payment Gateway')</th>
                    <th>@lang('Amount')</th>
                    <th>@lang('Status')</th>
                    <th>@lang('Created At')</th>
                    <th class="text-end">@lang('Action')</th>
                </tr>
            </thead>
            <!-- end table head -->

            <tbody>

                @foreach ($payments as $payment)
                    <tr>
                        <x-table.body.cell>
                            <div class="table-image-cell">
                                <img src="{{ asset('assets/admin/images/user2.jpg') }}" class="img-fluid" />
                                <div>
                                    <p class="m-0">{{ $payment->user->name }}</p>
                                    <small>{{ '@' . $payment->user->username }}</small>
                                </div>
                            </div>
                        </x-table.body.cell>

                        <x-table.body.cell>
                            <div class="table-image-cell">
                                <img src="{{ asset('storage/' . $payment->paymentGateway->image) }}" class="img-fluid" />
                                <div>
                                    <p class="m-0">{{ $payment->paymentGateway->name }}</p>
                                </div>
                            </div>
                        </x-table.body.cell>

                        <x-table.body.cell>
                            {{ $payment->amount }}
                        </x-table.body.cell>

                        <x-table.body.cell>
                            {!! $payment->statusBadge !!}
                        </x-table.body.cell>

                        <x-table.body.cell>
                            {{ $payment->created_at }}
                        </x-table.body.cell>

                        <x-table.body.cell class="text-end">
                            <x-button class="btn-danger btn-sm">
                                <x-icons.delete-v2 />
                                @lang('Delete')</a>
                            </x-button>
                        </x-table.body.cell>
                    </tr>
                @endforeach
            </tbody>

        </x-table>

        {!! $payments?->links() !!}
    </x-card>
@endsection
