<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branches;
use App\Models\Employees;
use App\Models\Services;
use Inertia\Inertia;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getServiceEmployees($service_id)
    {
        $employess= Employees::select('employees.*')
        ->join('employees_services','employees_services.employees_id','=','employees.id')
        ->where('employees_services.services_id',$service_id)
        ->get();

        return response()->json([
            'result' => true,
            'employess' => $employess
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services= Services::all();
        $branches= Branches::all();

        return Inertia::render('Buyer/Employees/CreateEmployessComponent',[
            'services' => $services,
            'branches' => $branches,
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
        // dd($request->all());
        $employee= new Employees;
        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->description = $request->description;
        $employee->gender = $request->gender;
        $employee->save();

        $service=\DB::table('employees_services')->insert([
            'services_id' => $request->services_id,
            'employees_id' => $employee->id
        ]);

        $branches=\DB::table('branches_employees')->insert([
            'branches_id' => $request->branches_id,
            'employees_id' => $employee->id
        ]);

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
        $employee=Employees::find($id);

        if ($employee->delete()) {
        }
        return \Redirect::route('premises.index');
    }
}
