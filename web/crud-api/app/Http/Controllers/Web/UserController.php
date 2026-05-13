<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Psy\Readline\Hoa\Console;
use Spatie\Permission\Models\Role;

class UserController extends Controller implements HasMiddleware
{   
    //use AuthorizesRequests;
    
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view users', only: ['index']),
            new Middleware('permission:edit users', only: ['edit']),
            new Middleware('permission:create users', only: ['create']),
            // new Middleware('permission:delete users', only: ['destroy']),
        ];
    }
  

  

    // public function __construct()
    // {
    //     $this->authorizeResource(User::class, 'user');
    // }

    /**
     * Display a listing of the resource.
     */
    // public function index()  ajax
    // {
    //     $users = User::latest()->paginate(3);
    //     return view('web.users.index', compact('users'));
    // }

    public function index(){
        $users = User::latest()->paginate(10);
        return view('users.list', compact('users'));
    }

    public function fetch(){

        $users = User::latest()->paginate(3);

        return view('web.users.users-data', compact('users'))->render();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $roles   = Role::orderBy('name','ASC')->get();  
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {


        // $data = [
        //     'name'      => $request->name,
        //     'email'     => $request->email,
        //     'password'  => $request->password,
        //     'age'       => $request->age
        // ];
        // $user = User::create($data);
        // return response()->json([
        //     'message' => 'Tạo thành công',
        //     'data'    => $user
        // ]);  ajax

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5',
            'age'  => 'numeric|min:1', 
            'email'=> 'required|email',[
                Rule::unique('users')
            ],
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->fails()){
            return redirect()->route('users.create')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        $user->save();
        
        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success','Them User Thanh Cong.');

        //6:30 #13
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('web.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(User $user)   ajax
    // {
    //     return view('web.users.edit', compact('user'));
    // }  ajax

    public function edit(string $id){

        $user    = User::findOrFail($id);
        $roles   = Role::orderBy('name','ASC')->get();  
        $hasRoles = $user->roles->pluck('id'); 

        return view('users.edit', compact('user','roles','hasRoles'));

    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, User $user){    ajax
    //         $data = $request->validate([
    //         'name' => ['min:5'],
    //         'age'   => ['numeric', 'min:1'],
    //         'password' => [Password::min(10)->mixedCase()->numbers()->symbols()]
    //     ],[
    //         'name.min'     => 'Tên ít nhất phải là 5 ký tự.',
    //         'age.numeric'  => 'Tuổi phải là số.',
    //         'age.min'      => 'Ít nhất phải 1 tuổi.',
    //         'password.min' => 'Password ít nhất phải là 10 ký tự.',
    //         'password.mixed_case' => 'password phải có ký tự hoa và thường.',
    //         'password.numbers'    => 'password phải có số.',
    //         'password.symbols'    => 'password phải có ký tự đặc biệt.'  
    //     ]);
    //     $user->update($data);

    //     // return redirect()->route('users.index', compact('user'));

    //     return response()->json([
    //         'message' => 'Cập nhật thành công',
    //         'data'    => $user
    //     ]);
    // }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5',
            'age'  => 'numeric|min:1', 
            'email'=> 'required|email',[
                Rule::unique('users')->ignore($id)
            ]
        ]);

        if($validator->fails()){
            return redirect()->route('users.edit',compact('id'))->withInput()->withErrors($validator);
        }
        $user->name = $request->name;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->save();
        
        $user->syncRoles($request->role);
        return redirect()->route('users.index')->with('success','Chinh Sua User Thanh Cong.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $user->delete();
        // return response()->json([
        //     'message' => 'successed.'
        // ]); 
        // if($request->ajax()){
        //     return response()->json([
        //         'message'=>'successed.'
        //     ]);
        // }
        // return redirect()->route('users.index');
        // return response()->json([
        //     'message' => 'xóa thành công.'
        // ]);

        $user = User::find($id);

        if($user == null){
            session()->flash('error','Khong Tim Thay User.');
            return response()->json([
                'status' => false
            ]);
        }
        $user->delete();
        session()->flash('success','Xoa User Thanh Cong');
        return response()->json([
            'status' => true
        ]);
    }
}