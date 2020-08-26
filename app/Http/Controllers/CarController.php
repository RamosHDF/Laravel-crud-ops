<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        //Serializing to json
       // return $cars->toJson(JSON_PRETTY_PRINT);

        //dd($cars);
        return view('cars.index',compact('cars'));
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
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required|max:255',
            'marque'=>'required|max:255',
            'modèle'=>'required|max:255'

        ]);

        $car = new Car([
            'nom' => $request ->get('nom'),
            'marque' => $request ->get('marque'),
            'modèle' => $request ->get('modèle')
        ]);
        $car->save();
        return redirect ('/cars')->with('success','New car added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);

        return view('cars.show',compact('car'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);

        return view('cars.edit',compact('car'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'nom'=>'required|max:255',
            'marque'=>'required|max:255',
            'modèle'=>'required|max:255'

        ]);
        $car = Car::find($id);
        $car->nom = $request ->get('nom');
        $car->marque = $request ->get('marque');
        $car->modèle = $request ->get('modèle');
        $car->save();

        return redirect ('/cars')->with('success','Car Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $car = Car::find($id);
     $car->delete();
     return redirect ('/cars')->with('success','Car deleted');

    }
}
