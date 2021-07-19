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
        $publications=Publications::all();

        // dd($publications);
        return Inertia::render('Buyer/Publications/PublicationsComponent',[
            'publications' => $publications,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Categories::all();
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
                // 'type' => 0,
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
        $publications->service_id = $request->service_id;
        $publications->employee_id = $request->employee_id;
        $publications->title = $request->title;
            //
        $publications->price = $request->price;
        $publications->discount = $discount;
            //
        $publications->description1 = $request->description1;
        $publications->description2 = $request->description2;
        $publications->description3 = $request->description3;
        $publications->description4 = $request->description4;

        $publications->save();

        $name_img=$this->uploadImage($premise, $request, $publications);
        

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
