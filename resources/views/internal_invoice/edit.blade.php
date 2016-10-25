@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('invoice.update_invoice')}}</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($invoice, array('route' => array('invoices.update', $invoice->id), 'method' => 'PUT')) !!}
					
					<div class="form-group">
					{!! Form::label('halflt', trans('invoice.halflt').' *') !!}
					{!! Form::text('halflt', Input::old('halflt'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('onelt', trans('invoice.onelt').' *') !!}
					{!! Form::text('onelt', Input::old('onelt'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('onehalflt', trans('invoice.onehalflt').' *') !!}
					{!! Form::text('onehalflt', Input::old('onehalflt'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('fivelt', trans('invoice.fivelt').' *') !!}
					{!! Form::text('fivelt', Input::old('fivelt'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('tenlt', trans('invoice.tenlt').' *') !!}
					{!! Form::text('tenlt', Input::old('tenlt'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('eighteenlt', trans('invoice.eighteenlt').' *') !!}
					{!! Form::text('eighteenlt', Input::old('eighteenlt'), array('class' => 'form-control')) !!}
					</div>



					{!! Form::submit(trans('invoice.submit'), array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection