<div class="form-group {{$errors->first('password') ? 'has-error' : ''}}">
    <label for="name">Password</label>
    {!! Form::password('password', ['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('password', ':message')}}</span>
</div>

<div class="form-group {{$errors->first('password_again') ? 'has-error' : ''}}">
    <label for="name">Password Again</label>
    {!! Form::password('password_again', ['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('password_again', ':message')}}</span>
</div>

