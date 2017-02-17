<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>Ascendant</th>
        <th>Message</th>
        <th>Controls</th>
    </tr>
    </thead>
    <tbody>
    {{--@if(!empty($messages))--}}
    @foreach($messages as $message)
        <tr>
            <td>{!! $message->id !!}</td>
            <td>{!! $message->date !!}</td>
            <td>{!! $message->ascendant->name!!}</td>
            <td>{!! $message->message !!}</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-flat btn-sm btn-primary"
                       href="{{route('messages.edit',[$message->id])}}"><span
                                class="fa fa-edit"></span></a>
                    <a class="btn btn-flat btn-sm btn-default"
                       href="{{route('messages.show',[$message->id])}}"><span
                                class="fa fa-eye"></span></a>
                    <button type="button" data-toggle="modal" data-target="#myModal"
                            class="btn btn-sm btn-danger btn-icon" onSubmit=""><span class=" fa fa-trash"></span>

                    </button>

                    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
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
                                {!! Form::open(['route'=>['messages.destroy', $message->id], 'method'=>'delete']) !!}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                                {!! Form::close() !!}
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </td>
        </tr>
    @endforeach
    {{--@endif--}}
    </tbody>
</table>