@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('employee.new_employee')}}</div>
				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'employees')) !!}

					<div class="form-group">
					{!! Form::label('name', trans('employee.name').' *') !!}
					{!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('email', trans('employee.email').' *') !!}
					{!! Form::text('email', Input::old('email'), array('class' => 'form-control')) !!}
					</div>

					<!--<div class="form-group">
					{!! Form::label('role', trans('Employee Role').' *') !!}
					<div class="col-sm-6">
					<input type="radio" class="form-control" name="role" value="admin" id ="admin">
					<label for="admin" class="radio-inline">Admin</label>
					</div>
					<div class="col-sm-6">
					<input type="radio" class="form-control" name="role" value="regular" id ="regular">
					<label for="regular" class="radio-inline">Non-Admin</label>
					</div>
					</div> -->

				
					<label class="control-label">Employee Role *</label>
                    <div class="form-inline">
    				<div class="controls-row">
    				<div class="col-sm-6"> 
      				<label class="radio inline">
        			<input type="radio" name="role" value="admin" id ="admin"/> Admin </label>
     			 	</div>
      				<div class="col-sm-6"> 
      				<label class="radio inline">
        			<input type="radio" value="regular" name="role" value="regular" id ="regular" /> Non-Admin </label>
      				</div>
    				</div>
  					</div>

					<div class="form-group">
					{!! Form::label('password', trans('employee.password').' *') !!}
					<input type="password" class="form-control" name="password" placeholder="Password">
					</div>

					<div class="form-group">
					{!! Form::label('password_confirmation', trans('employee.confirm_password').' *') !!}
					<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
					</div>

					{!! Form::submit(trans('employee.submit'), array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection