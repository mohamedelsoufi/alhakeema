@extends('layouts.app')
@section('title', 'Tasks')
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
                            <li class="breadcrumb-item active">Show Tasks</li>
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

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Show Tasks</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Assigned to</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $key => $task)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$task->title}}</td>
                                            <td>{{Str::limit($task->description,20)}}</td>
                                            <td>{{$task->user->name}}</td>
                                            <td id="status"
                                                @if($task->status == 'CANCELLED')
                                                class="bg-danger"
                                                @elseif($task->status == 'INPROGRESS')
                                                class="bg-info"
                                                @elseif($task->status == 'COMPLETED')
                                                class="bg-success"
                                                @else
                                                class="bg-warning"
                                                @endif
                                            >{{$task->status}}</td>
                                            <td>{{createdAtFormat($task->created_at)}}</td>
                                            <td>{{createdAtFormat($task->created_at) == updatedAtFormat($task->updated_at) ? '--' : updatedAtFormat($task->updated_at)}}</td>
                                            <td class="action">
                                                <a href="{{route('tasks.show',$task->id)}}"
                                                   class="btn btn-outline-info" data-toggle="tooltip"
                                                   title="Show">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="{{route('tasks.edit',$task->id)}}"
                                                   class="btn btn-outline-warning" data-toggle="tooltip"
                                                   title="Edit">
                                                    <i class="fas fa-pen"></i>
                                                </a>

                                                <a href="" class="btn btn-outline-danger"
                                                   data-toggle="modal"
                                                   data-target="#ModalDelete{{$task->id}}"
                                                   title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                @include('tasks.deleteModal')
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

    </div>

@endsection

@section('scripts')
    <script>
       

        Echo.channel('realTimePreview')
            .listen('UpdateTaskStatus', (e) => {
                console.log('Received test event');
                console.log(e.message);
                document.getElementById('status').innerText = e.message;
            });

    </script>
@endsection
