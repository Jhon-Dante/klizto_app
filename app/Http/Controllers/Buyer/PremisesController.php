<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Categories;
use App\Models\Premises;
use App\Models\Branches;
use App\Models\Wallet;

class PremisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $premises=Premises::where('user_id',\Auth::user()->id)->first();
        $branches=Branches::with('employees')->where('premise_id', $premises->id)->get();
        $wallet=Wallet::where('premise_id', $premises->id)->get();

        $categories = Categories::all();
        return Inertia::render('Buyer/Premises/PremisesComponent',[
            'premises' => $premises,
            'branches' => $branches,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request);
        $categories= Categories::all();
        return Inertia::render('Buyer/Premises/CreatePremisesComponent',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $premise=Premises::where('user_id',\Auth::id())->first();

        $branch = New branches;
        $branch->direction = $request->direction;
        $branch->phone = $request->phone;
        $branch->premise_id= $premise->id;
        $branch->status= 1;
        $branch->principal = '0';
        $branch->save();

        // return \Redirect::back();
        return \Redirect::route('premises.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
