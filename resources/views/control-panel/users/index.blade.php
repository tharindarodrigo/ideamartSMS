@extends('control-panel.layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Social Login</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Controls</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->provider==null ? "N/A" : $user->provider}}</td>
                        <td>{{$user->roles->first()['display_name']}}</td>
                        <td>{{$user->active ? "Active": "Disabled"}}</td>
                        <td>
                            <button class="btn btn-flat btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-flat btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{!! $user->id !!}">
                                <i class="fa fa-trash-o"></i>
                            </button>
                            <div id="deleteModal{!! $user->id !!}" class="modal modal-danger fade" role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Ban User!</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Delete this user?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-default pull-left" data-dismiss="modal">Close</button>
                                            {!! Form::open(['route'=>['users.destroy', $user->id], 'method'=>'delete']) !!}
                                            <button class="btn btn-danger">Yes</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($user->active)
                                <button class="btn btn-flat btn-sm btn-warning" data-toggle="modal" data-target="#banModal{!! $user->id !!}">
                                     <i class="fa fa-ban"></i>
                                </button>
                                <div id="banModal{!! $user->id !!}" class="modal modal-warning fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Ban User!</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to Ban this user?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning btn-default pull-left" data-dismiss="modal">Close</button>
                                                {!! Form::open(['route'=>['users.activate', $user->id], 'method'=>'patch']) !!}
                                                {!! Form::hidden('active', 0) !!}
                                                <button class="btn btn-warning btn-default">Yes</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <button class="btn btn-flat btn-sm btn-default" data-toggle="modal" data-target="#activateModal{!! $user->id !!}">
                                    <i class="fa fa-circle-o"></i>
                                </button>
                                <div id="activateModal{!! $user->id !!}" class="modal modal-warning fade" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Ban User!</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to Activate this user?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning btn-default pull-left" data-dismiss="modal">Close</button>
                                                {!! Form::open(['route'=>['users.activate', $user->id], 'method'=>'patch']) !!}
                                                {!! Form::hidden('active', 1) !!}
                                                <button class="btn btn-warning btn-default">Yes</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection