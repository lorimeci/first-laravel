<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequest;
use App\Http\Resources\CarResource;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Headquarter;
use App\Models\Product;
use App\Rules\UppercaseRule;
use Illuminate\Support\Facades\DB;


class CarsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //Query Builder
        //$cars=DB::table('cars')->paginate(4);

          $cars=Car::paginate(2); 
        // // $cars=Car::founded()->get();
        return view('cars.index',compact('cars'));
        //  $car =  Car::find(1);
        //  $car->description= 'Description example';
        // return $car;

        //  $cars = Car::orderBy('name')->get();
        //  return CarResource::collection($cars)->response()
        //  ->header('X-Value', 'True');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateValidationRequest $request)
    {
         $request ->validated();
        //If it's valid it will proceed
        //If it's not valid ,throw a ValidationEXception 
        $newImageName = time() .'-' .$request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'),$newImageName);

        $car=Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            'user_id'=> auth()->user()->id,
        ]);
         return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
            /*    $products=Product::find($id);
                print_r($products); */
        $hq=Headquarter::find($id);
        return view('cars.show')->with('car',$car);
        //return new CarResource($car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        return view('cars.edit')->with('car',$car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequest $request, $id)
    {
        //$newImageName = time() .'-' .$request->name . '.' . $request->image->extension();
        $request ->validated();
        $car=Car::where('id',$id)
           ->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
           // 'image_path' => $newImageName

        ]);
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect('/cars');
    }
}
