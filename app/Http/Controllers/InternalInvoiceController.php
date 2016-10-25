<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\InternalInvoice;
use App\User;
use App\Http\Requests\InternalInvoiceStoreRequest;
use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;
use Illuminate\Http\Request;

class InternalInvoiceController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			$invoices = InternalInvoice::all();
			$names = User::all();

			return view('internal_invoice.index')->with('name', $names)->with('invoice', $invoices);
	}

	// public function index()
	// {
	// 		$invoices = InternalInvoice::all();
	// 		$names = User::pluck('id', 'name');	

	// 		return view('internal_invoice.index',compact('invoices'));
	// }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{       //list of employee names to populate dropdown list
		    $names = User::all();

			return view('internal_invoice.create')->with('name', $names);
	}
      
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(InternalInvoiceStoreRequest $request)
	{
	            // store
	            $invoice = new InternalInvoice;
	            //id of user who entered record
	            $invoice->user_id = Auth::user()->id;
	            //name of employee who took merchandise from the store
	            $invoice->user_name = Input::get('employee_name');
	            $invoice->halflt = Input::get('halflt');
	            $invoice->onelt = Input::get('onelt');
	            $invoice->onehalflt = Input::get('onehalflt');
	            $invoice->fivelt = Input::get('fivelt');
	            $invoice->tenlt = Input::get('tenlt');
	            $invoice->eighteenlt = Input::get('eighteenlt');
	            $invoice->save();
	            //$user->invoice()->save($invoice);
	            
	            Session::flash('message', 'You have successfully added an internal invoice');
	            return Redirect::to('invoices');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$invoices = InternalInvoice::find($id);
        return view('internal_invoice.edit')
            ->with('invoice', $invoices);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			
			$rules = array(
			'name' => 'required',
			'role' => 'required',
			'password' => 'min:6|max:30|confirmed',
			);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->fails()) 
			{
				 return Redirect::to('employees/' . $id . '/edit')
				->withErrors($validator);
			} else {
	            $invoice = InternalInvoice::find($id);
	            $invoice->halflt = Input::get('halflt');
	            $invoice->onelt = Input::get('onelt');
	            $invoice->onehalflt = Input::get('onehalflt');
	            $invoice->fivelt = Input::get('fivelt');
	            $invoice->tenlt = Input::get('tenlt');
	            $invoice->eighteenlt = Input::get('eighteenlt');

	            $invoice->save();
	            // redirect
	            Session::flash('message', 'You have successfully updated an internal invoice');
	            return Redirect::to('invoices');
	        }
	    
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
				
			try 
			{
				$invoice = InternalInvoice::find($id);
		        $invoice->delete();
		        // redirect
		        Session::flash('message', 'You have successfully deleted an internal invoice');
		        return Redirect::to('employees');
	    	}
	    	catch(\Illuminate\Database\QueryException $e)
    		{
        		Session::flash('message', 'Integrity constraint violation: You Cannot delete a parent row');
        		Session::flash('alert-class', 'alert-danger');
		        return Redirect::to('invoices');	
	    	}
	    
	}

}
