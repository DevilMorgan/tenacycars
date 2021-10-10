<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UsedCar;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(DB::connection()->getDatabaseName());
        $website = \Hyn\Tenancy\Facades\TenancyFacade::website();
        // dd($website->uuid);
        if(!$website) {
            return redirect()->route('create-website');
        }
        $results = UsedCar::with(['car_model', 'color', 'fuel_type', 'body_type', 'transmission'])->latest()->paginate(50); //

        return view('carlist', ['results'=>$results]);
    }

    public function show($id)
    {
        $record = UsedCar::with(['user', 'car_model', 'color', 'fuel_type', 'body_type', 'transmission'])->find($id);
        // dd($record->toArray());
        // $media = $record->getMedia('cover_photo');
        // $media = $record->media->last();
        // dd($media[0]->getFullUrl());
        return view('show-car', ['record'=>$record]);
    }

}
