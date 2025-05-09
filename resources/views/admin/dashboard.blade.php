@extends('admin.layouts.app')

@section('content')
    <!-- content overview -->
    <div class="row">
        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <x-icons.wallet-cards />
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">{{ amount($widget['total_payment']) }}</h4>
                    <span class="overview-title">@lang('Total Payment')</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-bar-chart"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$156050</h4>
                    <span class="overview-title">Total Expense</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$1256</h4>
                    <span class="overview-title">Total Interest</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$96652</h4>
                    <span class="overview-title">Total Balance</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-pie-chart"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$156060</h4>
                    <span class="overview-title">Total Revenue</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-bar-chart"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$156050</h4>
                    <span class="overview-title">Total Expense</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$1256</h4>
                    <span class="overview-title">Total Interest</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$96652</h4>
                    <span class="overview-title">Total Balance</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-pie-chart"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$156060</h4>
                    <span class="overview-title">Total Revenue</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-bar-chart"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$156050</h4>
                    <span class="overview-title">Total Expense</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$1256</h4>
                    <span class="overview-title">Total Interest</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$96652</h4>
                    <span class="overview-title">Total Balance</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-pie-chart"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$156060</h4>
                    <span class="overview-title">Total Revenue</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-bar-chart"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$156050</h4>
                    <span class="overview-title">Total Expense</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$1256</h4>
                    <span class="overview-title">Total Interest</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Single block -->
            <div class="overview-block">
                <div class="overview-left pull-left">
                    <div class="overview-icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                </div>
                <div class="overview-right pull-left">
                    <h4 class="overview-value">$96652</h4>
                    <span class="overview-title">Total Balance</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
