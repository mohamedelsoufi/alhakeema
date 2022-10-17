@extends('layouts.app')
@section('title', 'Create User'))
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb {{app()->getLocale() == 'ar' ? 'float-sm-left' :  'float-sm-right'}}">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('users.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">Create User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @include('includes.alerts.success')
        @include('includes.alerts.errors')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Create User</h3>
                            </div>
                            <form action="{{route('users.store')}}" method="POST" autocomplete="off">
                                <div class="card-body">
                                    @csrf
                                    <div class="row">
                                        <div class="input-group col-6 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" name="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name') }}"
                                                   placeholder="Name">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="input-group col-6 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="text" name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email') }}" placeholder="Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-group col-6 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" name="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   value="{{ old('password') }}" placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="input-group col-6 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" name="password_confirmation"
                                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                                   value="{{ old('password_confirmation') }}"
                                                   placeholder="Confirm password">

                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-group col-6 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" name="is_admin" type="checkbox"
                                                       value="1" {{old('is_admin') ? "checked" : ""}}>
                                                <label class="form-check-label">Is Admin</label>
                                            </div>
                                        </div>

                                        <div class="input-group col-6 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" name="active" type="checkbox"
                                                       value="1" {{old('active') ? "checked" : ""}}>
                                                <label class="form-check-label">Active</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-block btn-outline-success">
                                                Create
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

    </div>

@endsection
