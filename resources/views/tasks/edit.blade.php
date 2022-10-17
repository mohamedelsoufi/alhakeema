@extends('layouts.app')
@section('title', 'Edit Task')
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
                                    href="{{route('tasks.index')}}">Tasks</a></li>
                            <li class="breadcrumb-item active">Edit Task</li>
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
                                <h3 class="card-title">Edit Task</h3>
                            </div>
                            <form method="post" action="{{route('tasks.update',$task->id)}}" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <input type="hidden" name="id" value="{{$task->id}}">
                                    <div class="row">
                                        <div class="form-group col-12 mb-3">
                                            <label>Title</label>
                                            <input type="text" name="title"
                                                   class="form-control @error('title') is-invalid @enderror"
                                                   value="{{ old('title',$task->title) }}"
                                                   placeholder="Title">
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Description</label>
                                            <textarea name="description"
                                                      class="form-control @error('description') is-invalid @enderror">{{ old('description',$task->description) }}</textarea>

                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        @if(auth('web')->user()->is_admin == 1)
                                            <div class="form-group col-md-6">
                                                <label>Assigned to</label>
                                                <select name="user_id"
                                                        class="form-control @error('user_id') is-invalid @enderror">
                                                    <option value="" selected>choose</option>
                                                    @foreach($users as $user)
                                                        <option
                                                            value="{{$user->id}}" {{old('user_id',$task->user_id) == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('user_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        @endif
                                        <div class="form-group col-md-6">
                                            <label>Status</label>
                                            <select name="status" {{$task->status == 'CANCELLED' ? 'disabled' : ''}}
                                            class="form-control @error('status') is-invalid @enderror">
                                                <option value="" selected>choose</option>
                                                <option
                                                    value="CANCELLED" {{old('status',$task->status) == 'CANCELLED' ? 'selected' : '' }}>
                                                    CANCELLED
                                                </option>
                                                <option
                                                    value="INPROGRESS" {{old('status',$task->status) == 'INPROGRESS' ? 'selected' : '' }}>
                                                    INPROGRESS
                                                </option>
                                                <option
                                                    value="COMPLETED" {{old('status',$task->status) == 'COMPLETED' ? 'selected' : '' }}>
                                                    COMPLETED
                                                </option>
                                                <option
                                                    value="HOLD" {{old('status',$task->status) == 'HOLD' ? 'selected' : '' }}>
                                                    HOLD
                                                </option>
                                            </select>
                                            @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-block btn-outline-info">
                                                Update
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
