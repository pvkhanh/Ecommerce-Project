@extends('admin.auth.template.auth')
@section('title', 'Login1')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 mx-auto">
                <div class="card pt-4">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <img src="{{ asset('backend/template/assets/images/favicon.svg') }}" height="48" class="mb-4">
                            <h3>Login</h3>
                            <p>Please log in to continue.</p>
                        </div>
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="" novalidate>
                            @csrf
                            <div class="form-group mb-3">
                                <label for="login" class="form-label">Email or Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">
                                        <i data-feather="user"></i>
                                    </span>
                                    <input type="text" id="login" name="login" value="{{ old('login') }}"
                                        class="form-control" placeholder="Enter email or username">
                                </div>
                            </div>
                            @error('login')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">
                                        <i data-feather="lock"></i>
                                    </span>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Enter password">
                                </div>
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-check clearfix my-3">
                                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                                <label for="remember" class="form-check-label">Remember me</label>
                            </div>

                            <button class="btn btn-primary w-100">Login</button>
                        </form>

                        <div class="divider">
                            <div class="divider-text">Or</div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn btn-primary w-100 mb-2">
                                    <i data-feather="facebook"></i> Facebook
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-secondary w-100 mb-2">
                                    <i data-feather="github"></i> Github
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
