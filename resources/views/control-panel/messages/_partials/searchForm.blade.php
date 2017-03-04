<div class="col-sm-2">
    <div class="form-group">
        <label for="ascendant_id">Ascendant</label>
    </div>
</div>
<div class="col-sm-3">
    <div class="form-group {{$errors->first('ascendant_id') ? 'has-error' : ''}}">
        {!! Form::select('ascendant_id', App\Ascendant::orderBy('name')->pluck('name', 'id'),!empty($ascendant) ? $ascendant: null,['class'=>'form-control', 'placeholder'=> 'All']) !!}
        <span class="help-block">{{$errors->first('ascendant_id', ':message')}}</span>
    </div>
</div>
<div class="col-sm-1">
    <div class="form-group">
        <label for="ascendant_id">Date</label>
    </div>
</div>
<div class="col-sm-3">

    <div class="form-group {{$errors->first('date') ? 'has-error' : ''}}">
        {!! Form::text('date', !empty($date) && $date!='any' ? $date : null,['class'=>'form-control', 'placeholder'=>'date', 'id'=>'datepicker']) !!}
        <span class="help-block">{{$errors->first('date', ':message')}}</span>
    </div>
</div>

<div class="col-sm-3">
    <div class="form-group {{$errors->first('date') ? 'has-error' : ''}}">
        <button class="btn btn-primary">Search</button>
    </div>
</div>