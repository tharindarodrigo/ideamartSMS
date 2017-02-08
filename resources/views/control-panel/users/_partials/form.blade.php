<div class="form-group {{$errors->first('name') ? 'has-error' : ''}}">
    <label for="name">Name </label>
    {!! Form::text('name', null,['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('name', ':message')}}</span>
</div>

<div class="form-group {{$errors->first('name') ? 'has-error' : ''}}">
    <label for="name">Email</label>
    {!! Form::text('email', null,['class'=>'form-control', 'disabled'=>true]) !!}
    <span class="help-block">{{$errors->first('name', ':message')}}</span>
</div>
<div class="form-group {{$errors->first('user_role') ? 'has-error' : ''}}">
    <label for="name">User Role</label>
    {!! Form::select('role_id', $roles, $user->roles->first()->id,['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('user_role', ':message')}}</span>
</div>
