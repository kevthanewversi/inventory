@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('employee.update_employee')}}</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($employee, array('route' => array('employees.update', $employee->id), 'method' => 'PUT')) !!}
					<div class="form-group">
					{!! Form::label('name', trans('employee.name').' *') !!}
					{!! Form::text('name', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('email', trans('employee.email').' *') !!}
					{!! Form::text('email', null, array('class' => 'form-control')) !!}
					</div>

					<!--<div class="form-group">
					{!! Form::label('role', trans('Employee Role').' *') !!}
					<input type="role" class="form-control" name="role" placeholder="Employee Role">
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
					{!! Form::label('password', trans('employee.password')) !!}
					<input type="password" class="form-control" name="password" placeholder="Password">
					</div>

					<div class="form-group">
					{!! Form::label('password_confirmation', trans('employee.confirm_password')) !!}
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