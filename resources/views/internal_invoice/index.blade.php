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
                

                <table class="table table-striped table-bordered">
                    <thead>
                    </thead>
                    <tbody>
                    @foreach($name as $value)
                    <tr>
                        <td>
                            <a href="{{ URL::to('invoices/invoices-view') }}"> {{ $value->name }} </a> 
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                <table>

			</div>
		</div>
	</div>
</div>
@endsection