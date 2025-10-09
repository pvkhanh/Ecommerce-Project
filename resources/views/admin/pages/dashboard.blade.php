{{-- @extends('layouts.admin')

@section('title', 'Trang Quản Trị')

@section('content')
    <h1>Chào mừng bạn đến với Dashboard</h1>
    {{-- Thêm nội dung dashboard tại đây --}}
{{-- @endsection --}} 


@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="page-title">
    <h3>Dashboard</h3>
    <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
</div>

<section class="section">
    <div class="row mb-2">
        {{-- Các thẻ thống kê --}}
        @php
            $stats = [
                ['title' => 'BALANCE', 'value' => '$50', 'canvas' => 'canvas1'],
                ['title' => 'Revenue', 'value' => '$532,2', 'canvas' => 'canvas2'],
                ['title' => 'ORDERS', 'value' => '1,544', 'canvas' => 'canvas3'],
                ['title' => 'Sales Today', 'value' => '423', 'canvas' => 'canvas4'],
            ];
        @endphp
        @foreach($stats as $stat)
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>{{ $stat['title'] }}</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{ $stat['value'] }}</p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="{{ $stat['canvas'] }}" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mb-4">
        {{-- Sales Card --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-heading p-1 pl-3'>Sales</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="pl-3">
                                <h1 class='mt-5'>$21,102</h1>
                                <p class='text-xs'><span class="text-green"><i data-feather="bar-chart" width="15"></i> +19%</span> than last month</p>
                                <div class="legends">
                                    <div class="legend d-flex flex-row align-items-center">
                                        <div class='w-3 h-3 rounded-full bg-info mr-2'></div><span class='text-xs'>Last Month</span>
                                    </div>
                                    <div class="legend d-flex flex-row align-items-center">
                                        <div class='w-3 h-3 rounded-full bg-blue mr-2'></div><span class='text-xs'>Current Month</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <canvas id="bar"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Orders Table --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Orders Today</h4>
                    <div class="d-flex ">
                        <i data-feather="download"></i>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class='table mb-0' id="table1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $orders = [
                                        ['Graiden', 'vehicula.aliquet@semconsequat.co.uk', '076 4820 8838', 'Offenburg', true],
                                        ['Dale', 'fringilla.euismod.enim@quam.ca', '0500 527693', 'New Quay', true],
                                        ['Nathaniel', 'mi.Duis@diam.edu', '(012165) 76278', 'Grumo Appula', false],
                                        ['Darius', 'velit@nec.com', '0309 690 7871', 'Ways', true],
                                        ['Ganteng', 'velit@nec.com', '0309 690 7871', 'Ways', true],
                                        ['Oleg', 'rhoncus.id@Aliquamauctorvelit.net', '0500 441046', 'Rossignol', true],
                                        ['Kermit', 'diam.Sed.diam@anteVivamusnon.org', '(01653) 27844', 'Patna', true],
                                    ];
                                @endphp
                                @foreach($orders as [$name, $email, $phone, $city, $active])
                                    <tr>
                                        <td>{{ $name }}</td>
                                        <td>{{ $email }}</td>
                                        <td>{{ $phone }}</td>
                                        <td>{{ $city }}</td>
                                        <td>
                                            <span class="badge {{ $active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar Widget --}}
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header">
                    <h4>Your Earnings</h4>
                </div>
                <div class="card-body">
                    <div id="radialBars"></div>
                    <div class="text-center mb-5">
                        <h6>From last month</h6>
                        <h1 class='text-green'>+$2,134</h1>
                    </div>
                </div>
            </div>

            <div class="card widget-todo">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title d-flex">
                        <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Progress
                    </h4>
                </div>
                <div class="card-body px-0 py-1">
                    @php
                        $tasks = [
                            ['UI Design', 'info', 60],
                            ['VueJS', 'success', 35],
                            ['Laravel', 'danger', 50],
                            ['ReactJS', 'primary', 80],
                            ['Go', 'secondary', 65],
                        ];
                    @endphp
                    <table class='table table-borderless'>
                        @foreach($tasks as [$task, $type, $percent])
                            <tr>
                                <td class='col-3'>{{ $task }}</td>
                                <td class='col-6'>
                                    <div class="progress progress-{{ $type }}">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class='col-3 text-center'>{{ $percent }}%</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
