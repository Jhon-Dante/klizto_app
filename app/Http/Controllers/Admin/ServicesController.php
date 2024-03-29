<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($category_id)
    {
        $user_id = \Auth::user()->id;

        $services = \DB::table('services')->select('services.*')
        ->join('employees_services','employees_services.services_id','=','services.id')
        ->join('employees','employees.id','=','employees_services.employees_id')
        ->join('branches_employees','branches_employees.employees_id','=','employees.id')
        ->join('branches','branches.id','=','branches_employees.branches_id')
        ->join('premises','premises.id','=','branches.premise_id')
        ->where('premises.user_id',$user_id)
        ->where('services.deleted_at',null)
        // ->where('services.status',1)
        ->groupBy('services.id')
        ->when(!is_null($category_id), function ($query) use ($category_id) {
            $query->where('services.category_id', $category_id);
        })
        ->get();

        return response()->json([
            'result' => true,
            'services' => $services
        ]);
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
        //
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
