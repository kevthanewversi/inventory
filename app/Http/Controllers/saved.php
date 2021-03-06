// <?php namespace App\Http\Controllers;

// use App\Http\Requests;
// use App\Http\Controllers\Controller;
// use App\InternalInvoice;
// use App\User;
// use App\Http\Requests\InternalInvoiceStoreRequest;
// use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;
// use Illuminate\Http\Request;

// class InternalInvoiceController extends Controller {

// 	public function __construct()
// 	{
// 		$this->middleware('auth');
// 	}

// 	/**
// 	 * Display a listing of the resource.
// 	 *
// 	 * @return Response
// 	 */
// 	public function index()
// 	{
// 			$invoices = InternalInvoice::all();
// 			return view('internal_invoice.index')->with('invoice', $invoices);
// 	}

// 	/**
// 	 * Show the form for creating a new resource.
// 	 *
// 	 * @return Response
// 	 */
// 	public function create()
// 	{
// 			return view('internal_invoice.create');
// 	}

// 	/**
// 	 * Store a newly created resource in storage.
// 	 *
// 	 * @return Response
// 	 */
// 	public function store(InternalInvoiceStoreRequest $request)
// 	{
// 	            // store
// 	            $invoice = new InternalInvoice;
// 	            $user = Auth::user()->id;
// 	            $invoice->employee_id = $user['id'];
// 	            $invoice->halflt = $user['name'];
// 	            //$invoice->user()->associate()->id;
// 	            $invoice->halflt = Input::get('halflt');
// 	            $invoice->onelt = Input::get('onelt');
// 	            $invoice->onehalflt = Input::get('onehalflt');
// 	            $invoice->fivelt = Input::get('fivelt');
// 	            $invoice->tenlt = Input::get('tenlt');
// 	            $invoice->eighteenlt = Input::get('eighteenlt');
// 	            $invoice->save();
// 	            //$user->invoice()->save($invoice);

// 	            Bookshelf::with('books')->find($id)->books
	            
// 	            Session::flash('message', 'You have successfully added an internal invoice');
// 	            return Redirect::to('internal_invoice');
// 	}

// 	/**
// 	 * Display the specified resource.
// 	 *
// 	 * @param  int  $id
// 	 * @return Response
// 	 */
// 	public function show($id)
// 	{
// 		//
// 	}

// 	*
// 	 * Show the form for editing the specified resource.
// 	 *
// 	 * @param  int  $id
// 	 * @return Response
	 
// 	public function edit($id)
// 	{
// 		$invoice = InternalInvoice::find($id);
//         return view('internal_invoice.edit')
//             ->with('invoice', $invoices);
// 	}

// 	/**
// 	 * Update the specified resource in storage.
// 	 *
// 	 * @param  int  $id
// 	 * @return Response
// 	 */
// 	public function update($id)
// 	{
			
// 			$rules = array(
// 			'name' => 'required',
// 			'email' => 'required|email|unique:invoice,email,' . $id .'',
// 			'role' => 'required',
// 			'password' => 'min:6|max:30|confirmed',
// 			);
// 			$validator = Validator::make(Input::all(), $rules);
// 			if ($validator->fails()) 
// 			{
// 				 return Redirect::to('employees/' . $id . '/edit')
// 				->withErrors($validator);
// 			} else {
// 	            $invoice = InternalInvoice::find($id);
// 	            $invoice->halflt = Input::get('halflt');
// 	            $invoice->onelt = Input::get('onelt');
// 	            $invoice->onehalflt = Input::get('onehalflt');
// 	            $invoice->fivelt = Input::get('fivelt');
// 	            $invoice->tenlt = Input::get('tenlt');
// 	            $invoice->eighteenlt = Input::get('eighteenlt');

// 	            $invoice->save();
// 	            // redirect
// 	            Session::flash('message', 'You have successfully updated an internal invoice');
// 	            return Redirect::to('invoices');
// 	        }
	    
// 	}

// 	/**
// 	 * Remove the specified resource from storage.
// 	 *
// 	 * @param  int  $id
// 	 * @return Response
// 	 */
// 	public function destroy($id)
// 	{
				
// 			try 
// 			{
// 				$invoice = InternalInvoice::find($id);
// 		        $invoice->delete();
// 		        // redirect
// 		        Session::flash('message', 'You have successfully deleted an internal invoice');
// 		        return Redirect::to('employees');
// 	    	}
// 	    	catch(\Illuminate\Database\QueryException $e)
//     		{
//         		Session::flash('message', 'Integrity constraint violation: You Cannot delete a parent row');
//         		Session::flash('alert-class', 'alert-danger');
// 		        return Redirect::to('invoices');	
// 	    	}
	    
// 	}

// }

 cont 
 $categories = Category::select('id', 'name')->lists('name', 'id')->prepend('Select a category', '')->toArray();

view 
{!! Form::select('cat_id', $categories, old('cat_id')) !!}

