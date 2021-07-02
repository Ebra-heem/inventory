<?php

namespace App\Http\Controllers;

use App\AccountGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=AccountGroup::all();
        return view('backend.account.account_group.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AccountGroup::create(request()->all());
        toastr()->success('Account Group Created', 'System Says');
        return redirect()->route('account_group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AccountGroup $accountGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountGroup $accountGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountGroup $accountGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountGroup $accountGroup)
    {
        //
    }
}
