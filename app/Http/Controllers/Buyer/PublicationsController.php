<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\publications;
use App\Models\Categories;
use App\Models\Services;
use App\Models\Premises;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id =\Auth::user()->id;


        $publications=Publications::select('publications.*')
        ->join('premises','premises.id','=','publications.premise_id')
        ->where('premises.user_id',$user_id)
        // ->where('publications.status',1)
        ->get();

        // dd($publications);
        return Inertia::render('Buyer/Publications/PublicationsComponent',[
            'publications' => $publications,
        ]);
    }


    public function get()
    {

        $publications=Publications::all();
        return response()->json([
            'result' => true,
            'publications' => $publications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(public_path());
        $user_id = \Auth::user()->id;

        $categories= \DB::table('categories')->select('categories.*')
        ->join('services','services.category_id','=','categories.id')
        ->join('employees_services','employees_services.services_id','=','services.id')
        ->join('employees','employees.id','=','employees_services.employees_id')
        ->join('branches_employees','branches_employees.employees_id','=','employees.id')
        ->join('branches','branches.id','=','branches_employees.branches_id')
        ->join('premises','premises.id','=','branches.premise_id')
        ->where('premises.user_id',$user_id)
        ->where('services.deleted_at',null)
        // ->where('status',1)
        ->groupBy('id')
        ->get();

        // dd($categories);
        $services= Services::all();

        return Inertia::render('Buyer/Publications/CreatePublicationsComponent',[
            'categories' => $categories,
            'services' => $services,
        ]);
    }

    public function uploadImage($premise, $request, $publications)
    {
        // dd($input['image']);
        for ($i=0; $i < count($request->img) ; $i++) { 

            $file = $request->img[$i];
            $name = time()."".$premise->user_id."".$i.".png";
            \Storage::disk('publication')->put($name,  \File::get($file));

            \DB::table('publications_images')->insert([
                'image' => $name,
                'url' => '/public/images/publications/'.$name,
                'publications_id' => $publications->id
            ]);
        }
        return true;
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
        $premise=Premises::where('user_id',\Auth::id())->first();

        $discount=$request->price/0.15;
        $publications= new Publications;
        $publications->premise_id = $premise->id;
        $publications->img = 'image';
        $publications->date_ac_start = $request->date_ac_start;
        $publications->date_ac_end = $request->date_ac_end;
        $publications->category_id = $request->category_id;
        $publications->title = $request->title;
        $publications->price = $request->price;
        $publications->discount = $discount;

        $publications->save();

        $name_img=$this->uploadImage($premise, $request, $publications);

        for ($i=0; $i < count($request->service_id); $i++) { 
            \DB::table('publications_services')->insert([
                'services_id' => $request->service_id[$i],
                'publications_id' => $publications->id
            ]);
        }

        for ($i=0; $i < count($request->employee_id); $i++) { 
            \DB::table('employees_publications')->insert([
                'employees_id' => $request->employee_id[$i],
                'publications_id' => $publications->id
            ]);
        }
        

        return \Redirect::route('publications.index');
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
