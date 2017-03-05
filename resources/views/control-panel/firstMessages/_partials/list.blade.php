<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Ascendant</th>
        <th>Message</th>
        <th>Controls</th>
    </tr>
    </thead>
    <tbody>
    {{--@if(!empty($firstMessages))--}}
    @foreach($firstMessages as $message)
        <tr>
            <td>{!! $message->id !!}</td>
            <td>{!! $message->ascendant->name!!}</td>
            <td>{!! $message->message !!}</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-flat btn-sm btn-primary"
                       href="{{route('first-messages.edit',[$message->id])}}"><span
                                class="fa fa-edit"></span></a>
                    <button type="button" data-toggle="modal" data-target="#myModal{{$message->id}}"
                            class="btn btn-sm btn-danger btn-icon" onSubmit=""><span class=" fa fa-trash"></span>

                    </button>

                    <div class="modal fade" tabindex="-1" role="dialog" id="myModal{{$message->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Delete Message</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to Delete Item ?</p>
                                </div>
                                {!! Form::open(['route'=>['first-messages.destroy', $message->id], 'method'=>'delete']) !!}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    {{--@endif--}}
    </tbody>
</table>