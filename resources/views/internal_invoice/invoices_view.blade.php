@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('invoice.list_invoices')}}</div>

				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('invoices/create') }}">{{trans('invoice.new_invoice')}}</a>
				<hr />
@if (Session::has('message'))
	<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

    <select name="employee_names">
    @foreach($name as $names)
     <option value="{{ $names->id }}">{{ $names->name}}</option>
    @endforeach
</select>
<br>


<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>{{trans('invoice.person_id')}}</td>
            <td>{{trans('invoice.name')}}</td>
            <td>{{trans('invoice.halflt')}}</td>
            <td>{{trans('invoice.onelt')}}</td>
            <td>{{trans('invoice.onehalflt')}}</td>
            <td>{{trans('invoice.fivelt')}}</td>
            <td>{{trans('invoice.tenlt')}}</td>
            <td>{{trans('invoice.eighteenlt')}}</td>
            <td>{{trans('invoice.date')}}</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    @foreach($invoice as $value)

   
        <tr>
            <td>{{ $value->user_id }}</td>
            <td>{{ $value->user_name }}</td>
            <td>{{ $value->halflt }}</td>
            <td>{{ $value->onelt }}</td>
            <td>{{ $value->onehalflt }}</td>
            <td>{{ $value->fivelt }}</td>
            <td>{{ $value->tenlt }}</td>
            <td>{{ $value->eighteenlt }}</td>
            <td>{{ $value->created_timestamp }}</td>
            <td>

                <a class="btn btn-small btn-info" href="{{ URL::to('invoices/' . $value->id . '/edit') }}">{{trans('invoice.edit')}}</a>
                {!! Form::open(array('url' => 'invoices/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit(trans('invoice.delete'), array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection