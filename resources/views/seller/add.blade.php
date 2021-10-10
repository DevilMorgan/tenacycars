@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Post Cars</div>
                
                <div class="card-body">
                
                @if(isset($record->id))
                    {{ Form::model($record, ['route' => ['update-car', $record->id], 'method' => 'put', 'files'=>'true']) }}
                @else
                    {{ Form::open(array('url' => route('store-car'), 'files'=>'true')) }}
                @endif

                    @csrf

                    <div class="form-group row">
                        <div class="col">
                            <label class="form-label">Title</label>    
                            {{ Form::text('title', old('title'), array_merge(['class' => 'form-control'], ['placeholder' => 'Enter Title'])) }}
                            @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Make / Model</label>    
                            {{ Form::select('car_model_id', $result['make_and_model_arr'], old('car_model_id'), array_merge(['class' => 'form-control'], ['placeholder' => 'Select Make / Model'])); }}
                            @error('car_model_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label class="form-label">Transmission</label>    
                            {{ Form::select('transmission_id', $result['transmissions'], old('transmission_id'), array_merge(['class' => 'form-control'], ['placeholder' => 'Select Transmission'])); }}
                            @error('transmission_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Body Type</label>    
                            {{ Form::select('body_type_id', $result['body_types'], old('body_type_id'), array_merge(['class' => 'form-control'], ['placeholder' => 'Select Body Type'])); }}
                            @error('body_type_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label class="form-label">Color</label>    
                            {{ Form::select('color_id', $result['colors'], old('color_id'), array_merge(['class' => 'form-control'], ['placeholder' => 'Select Color'])); }}
                            @error('color_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Fuel Type</label>    
                            {{ Form::select('fuel_type_id', $result['fuel_types'], old('fuel_type_id'), array_merge(['class' => 'form-control'], ['placeholder' => 'Select Fuel Type'])); }}
                            @error('fuel_type_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label class="form-label">Registration Year</label>    
                            {{ Form::selectRange('registration_year', 2021, 1980, old('registration_year'), array_merge(['class' => 'form-control'], ['placeholder' => 'Select Registration Year'])); }}
                            @error('registration_year')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                        <div class="col">
                            <label class="form-label">Number of Owner</label>    
                            {{ Form::selectRange('number_of_owner', 1, 5, old('number_of_owner'), array_merge(['class' => 'form-control'], ['placeholder' => 'Select Number of Owner'])); }}
                            @error('number_of_owner')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label class="form-label">KM Driven</label>    
                            {{ Form::number('km_driven', old('km_driven'), array_merge(['class' => 'form-control'], ['placeholder' => 'Enter KM Driven'])); }}
                            @error('km_driven')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                        <div class="col">
                            <label class="form-label">Car Location</label>    
                            {{ Form::text('car_location', old('car_location'), array_merge(['class' => 'form-control'], ['placeholder' => 'Enter Car Location'])) }}
                            @error('car_location')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label class="form-label">About Car</label>    
                            {{ Form::textarea('about_car', old('about_car'), array_merge(['class' => 'form-control', 'rows' => '5'], ['placeholder' => 'Share about your Car'])) }}
                            @error('about_car')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                    </div>                    

                    <div class="form-group row">
                        <div class="col">
                        <label class="form-label">Cover Photo</label>    
                            {{ Form::file('cover_photo', array_merge(['class' => 'form-control'], ['placeholder' => 'Upload Cover Photo']) ); }}
                            @error('cover_photo')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            
                        </div>
                        <div class="col">
                            <br />
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                    

                    {{ Form::close() }}

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
