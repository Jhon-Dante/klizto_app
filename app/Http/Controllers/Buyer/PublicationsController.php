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

    public function uploadImage($premise, $request)
    {
        // dd($input['image']);
        $file = $request->img;
        //Se optiene el nombre
        $name = time()."".$premise->user_id.".png";
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('publication')->put($name,  \File::get($file));
        // $avatar = Storage::putFile('public/defaults/users/avatar/', base64_decode($file_data));

        // $user->profile_photo_path=$name;
        // $user->save();

        return $name;
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

        $name_img=$this->uploadImage($premise, $request);

        $discount=$request->price/0.15;
        $publications=Publications::insert([
            'premise_id' => $premise->id,
            //
            'img' => $name_img,
            //
            'date_ac_start' => $request->date_ac_start,
            'date_ac_end' => $request->date_ac_end,
            //
            'category_id' => $request->category_id,
            'service_id' => $request->service_id,
            'employee_id' => $request->employee_id,
            'title' => $request->title,
            //
            'price' => $request->price,
            'discount' => $discount,
            //
            'description1' => $request->description1,
            'description2' => $request->description2,
            'description3' => $request->description3,
            'description4' => $request->description4
        ]);

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
