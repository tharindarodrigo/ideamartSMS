<div class="form-group {{$errors->first('phone') ? 'has-error' : ''}}">
    <label for="name">Name </label>
    {!! Form::text('name', null,['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('name', ':message')}}</span>
</div>