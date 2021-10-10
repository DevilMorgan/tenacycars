<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\UsedCar;
use App\Models\Make;
use App\Models\CarModel;
use App\Models\BodyType;
use App\Models\Color;
use App\Models\FuelType;
use App\Models\Transmission;

use Auth;

class DashboardController extends Controller
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
    public function index(Request $request)
    {
        $results = UsedCar::withTrashed()->with(['car_model', 'color', 'fuel_type', 'body_type', 'transmission'])->where('user_id', auth()->user()->id)->paginate(5); //
        // OR
        // $results = Auth::user()->usedcars()->with(['car_model', 'color', 'fuel_type', 'body_type', 'transmission'])->get();
        
        return view('seller.list', ['results'=>$results]);
    }

    public function create_or_edit($id='')
    {
        if($id) {
            $record = UsedCar::find($id);
        } else {
            $record = new UsedCar;
        }

        $make_and_model_arr = CarModel::select(['id', 'name', 'make_id'])
                            ->with('make')
                            ->get()
                            ->groupBy('make.name')->map(function($makes, $make_name) {
                                return $makes->pluck('name', 'id');
                            });

        $result['colors'] = Color::pluck('name', 'id');
        $result['body_types'] = BodyType::pluck('name', 'id');
        $result['fuel_types'] = FuelType::pluck('name', 'id');
        $result['transmissions'] = Transmission::pluck('name', 'id');
        $result['make_and_model_arr'] = $make_and_model_arr;

        return view('seller.add', ['result'=>$result, 'record'=>$record]);
    }

    public function save(Request $request, $id=null)
    {
        $attributes = [
            'car_model_id' => 'Make / Model',
            'color_id' => 'Color',
            'fuel_type_id' => 'Fuel Type',
            'body_type_id' => 'Body Type',
            'transmission_id' => 'Transmission',
        ];

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:191',
            'car_model_id' => 'required',
            'color_id' => 'required',
            'fuel_type_id' => 'required',
            'body_type_id' => 'required',
            'transmission_id' => 'required',
            'registration_year' => 'required',
            'km_driven' => 'required',
            'number_of_owner' => 'required',
            'car_location' => 'required',
            'about_car' => 'required',
            'cover_photo' => $id ? 'sometimes|file|max:2048|mimes:jpg,png' :'required|file|max:2048|mimes:jpg,png',
        ], [], $attributes);

        if ($validator->fails()) {
            return redirect()->route('post-car')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $validator->validated();
        $data['user_id'] = auth()->user()->id;
        
        // if($request->has('cover_photo')) {
        //     $file = $request->file('cover_photo');
        //     $file_name = time() ."-" . $file->getClientOriginalName();
        //     $request->cover_photo->storeAs(NULL, $file_name, ['disk' => 'cover_photo_disk']);
        //     $data['cover_photo'] = $file_name;
        // }

        if($id) {
            $car_details = UsedCar::find($id);
            $car_details->update($data);
        } else {
            $car_details = UsedCar::create($data);
        }

        if($request->has('cover_photo')) {
            $car_details
            ->addMedia($request->file('cover_photo'))
            ->toMediaCollection('cover_photo');
        }        
        return redirect()->route('seller-dashboard');
    }

    public function delete($id)
    {
        $car_details = UsedCar::find($id);
        $car_details->delete();    
        return redirect()->route('seller-dashboard');
    }

    public function restore($id)
    {
        $car_details = UsedCar::withTrashed()->find($id);
        $car_details->restore();    
        return redirect()->route('seller-dashboard');
    }
    
}