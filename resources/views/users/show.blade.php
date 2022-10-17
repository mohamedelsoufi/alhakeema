@extends('layouts.app')
@section('title', 'Show User')
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
                            <li class="breadcrumb-item active">Show User</li>
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
                                <h3 class="card-title">Show User</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th class="show-details-table">Name</th>
                                            <td> {{$user->name}}</td>
                                        </tr>

                                        <tr>
                                            <th class="show-details-table">Email</th>
                                            <td> {{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <th class="show-details-table">User Type</th>
                                            <td> {{$user->getIsAdmin()}}</td>
                                        </tr>
                                        <tr>
                                            <th class="show-details-table">Activity</th>
                                            <td> {{$user->getActive()}} </td>
                                        </tr>

                                        <tr>
                                            <th class="show-details-table">Created at</th>
                                            <td>{{createdAtFormat($user->created_at)}}</td>
                                        </tr>

                                        <tr>
                                            <th class="show-details-table">Updated at</th>
                                            <td>{{createdAtFormat($user->created_at) == updatedAtFormat($user->updated_at) ? '--' : updatedAtFormat($user->updated_at)}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="{{route('users.edit',$user->id)}}"
                                               class="btn btn-block btn-outline-info">
                                                Edit
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
