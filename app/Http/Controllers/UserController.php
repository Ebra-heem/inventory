<?php
namespace App\Http\Controllers;
use Auth;
use Hash;
use App\User;
use Validator;
use App\SaleInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index(Request $request)
        {
        
            $data = User::orderBy('id','DESC')->paginate(5);
            return view('backend.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        }

        public function mySale()
        {
            $sales=SaleInvoice::where('user_id',auth()->user()->id)->get();
            //return $sales;
            return view('backend.users.sales',compact('sales'));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
            $roles = Role::pluck('name','name')->all();
            return view('backend.users.create',compact('roles'));
        }
        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function store(Request $request)
        {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirm-password',
        'roles' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
        ->with('success','User created successfully');
        }
        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
        $user = User::find($id);
        return view('backend.users.show',compact('user'));
        }
        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('backend.users.edit',compact('user','roles','userRole'));
        }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'same:confirm-password',
        'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){
        $input['password'] = Hash::make($input['password']);
        }else{
        $input = array_except($input,array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
        ->with('success','User updated successfully');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
        User::find($id)->delete();
        return redirect()->route('users.index')
        ->with('success','User deleted successfully');
        }

    public function settings()
	{
		$user = Auth::user();
		return view('backend.users.settings',compact('user'));
	}

	public function postSettings(Request $request)
	{

		if ($request->exists('for'))
		{
			$data = $request->except(['userName','group']);
			if($request->input('for')=="info")
			{
				$rules=[
					'firstname' => 'required',
					'lastname' => 'required',
					'email' => 'email',

				];
			}
			else {
				if(!Hash::check($request->input('oldpassword'), auth()->user()->password)){
                    toastr()->error('Old Password did not match!!!');
				
					return Redirect::back();
				}
				$rules=[
					'oldpassword' => 'required|min:6',
					'password' => 'required|confirmed|min:6'
				];
			}
			$validator = Validator::make($data, $rules);
			if ($validator->fails())
			{
				return Redirect::back()->withErrors($validator);
			}

			
			$data['password']=Hash::make($data['password']);
			$data['password_confirmation']=Hash::make($data['password_confirmation']);
			//dd($data);
			$user = User::findOrFail(auth()->user()->id);
			$user->fill($data)->save();
			toastr()->success('Password Updated');
			return Redirect::back();
		}
        toastr()->error('Invalid request!!!');
		return Redirect::back();


	}
}