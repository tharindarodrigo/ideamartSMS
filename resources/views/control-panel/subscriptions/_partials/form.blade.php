<div class="form-group {{$errors->first('date') ? 'has-error' : ''}}">
    <label for="name">Date </label>
    {!! Form::input('date', 'date', null,['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('date', ':subscription')}}</span>
</div>
<div class="form-group {{$errors->first('subscription') ? 'has-error' : ''}}">
    <label for="email">Subscription </label>
    {!! Form::textarea('subscription', null,['class'=>'form-control', 'placeholder'=> 'Subscription', 'rows'=>3]) !!}
    <span class="help-block">{{$errors->first('subscription', ':subscription')}}</span>
</div>