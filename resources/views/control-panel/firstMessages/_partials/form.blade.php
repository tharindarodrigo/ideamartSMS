<div class="form-group {{$errors->first('ascendant_id') ? 'has-error' : ''}}">
    <label for="name">Ascendant </label>
    {!! Form::select('ascendant_id', App\Ascendant::orderBy('name')->pluck('name', 'id'),null,['class'=>'form-control', 'placeholder'=> 'Ascendant']) !!}
    <span class="help-block">{{$errors->first('ascendant_id', ':message')}}</span>
</div>

<div class="form-group {{$errors->first('message') ? 'has-error' : ''}}">
    <label for="email">Message </label>
    {!! Form::textarea('message', null,['class'=>'form-control', 'placeholder'=> 'Message', 'rows'=>5]) !!}
    <span class="help-block">{{$errors->first('message', ':message')}}</span>
</div>