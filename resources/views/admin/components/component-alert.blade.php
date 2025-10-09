@extends('layouts.admin')

@section('title', 'Alert - Voler Admin Dashboard')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Alert</h3>
                <p class="text-subtitle text-muted">A pretty helpful component for giving message to user</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Alert</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12 col-md-6">
                {{-- Default Alert --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Default</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-primary">This is primary alert.</div>
                        <div class="alert alert-success">This is success alert.</div>
                        <div class="alert alert-warning">This is warning alert.</div>
                        <div class="alert alert-danger">This is danger alert.</div>
                        <div class="alert alert-dark">This is dark alert.</div>
                        <div class="alert alert-secondary">This is secondary alert.</div>
                        <div class="alert alert-light">This is light alert.</div>
                        <div class="alert alert-info">This is info alert.</div>
                    </div>
                </div>

                {{-- With Icon --}}
                <div class="card">
                    <div class="card-header">
                        <h4>With Icon</h4>
                    </div>
                    <div class="card-body">
                        @foreach(['primary', 'success', 'warning', 'danger', 'secondary', 'info'] as $type)
                            <div class="alert alert-{{ $type }}"><i data-feather="star"></i> This is {{ $type }} alert.</div>
                        @endforeach
                    </div>
                </div>

                {{-- Light --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Light</h4>
                    </div>
                    <div class="card-body">
                        @foreach(['primary', 'success', 'warning', 'danger', 'secondary', 'info'] as $type)
                            <div class="alert alert-light-{{ $type }} color-{{ $type }}"><i data-feather="star"></i> This is
                                {{ $type }} alert.</div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Heading and Dismissable --}}
            <div class="col-12 col-md-6">
                {{-- Heading --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Heading</h4>
                    </div>
                    <div class="card-body">
                        @foreach(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'] as $type)
                            <div class="alert alert-{{ $type }}">
                                <h4 class="alert-heading">{{ ucfirst($type) }}</h4>
                                <p>This is a {{ $type }} alert.</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Dismissable --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Dismissable</h4>
                    </div>
                    <div class="card-body">
                        @foreach(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'] as $type)
                            <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
                                This is a {{ $type }} alert.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection