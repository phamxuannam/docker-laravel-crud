<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $account = Account::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'email'=> 'required|email',[
                Rule::unique('accounts')->ignore($id)
            ]
        ]);

        if($validator->fails()){
            return redirect()->route('account.edit',$id)->withInput()->withErrors($validator);
        }

        $account->name = $request->name;
        $account->email = $request->email;
        $account->save();

        $account->syncRoles($request->role);
        

        return redirect()->route('accounts.index')->with('success','Chinh Sua Account Thanh Cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
