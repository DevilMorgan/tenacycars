@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">View Car Details</div>

                <div class="row">
                    <div class="text-center col-4">
                        <div>
                            <img src="{{url('/images/car-1.jpg')}}" class="img-thumbnail rounded" alt="...">
                        </div>
                    </div>

                    <div class="text-center col-4">
                        <div class="card-body text-left">
                            <h5 class="card-title"><b>{{ $record->title }}</b></h5>
                            <p class="h6"><b>Make:</b> {{ $record->car_model->make->name }}</p>
                            <p class="h6"><b>Model:</b> {{ $record->car_model->name }}</p>
                            <p class="h6"><b>Color:</b> {{ $record->color->name }}</p>
                            <p class="h6"><b>Transmission:</b> {{ $record->transmission->name }}</p>
                            <p class="h6"><b>Body Type:</b> {{ $record->body_type->name }}</p>
                            <p class="h6"><b>Fuel Type:</b> {{ $record->fuel_type->name }}</p>
                            <p class="h6"><b>Owner:</b> {{ $record->user->name }}</p>
                        </div>
                    </div>
                    
                    <div class="text-center col-4">
                        <div class="card-body text-left">
                            
                            <p class="h6"><b>Registration Year:</b> {{ $record->registration_year }}</p>
                            <p class="h6"><b>Number of Owner:</b> {{ $record->number_of_owner }}</p>
                            <p class="h6"><b>KM Driven:</b> {{ $record->km_driven }}</p>
                            <p class="h6"><b>Car Location:</b> {{ $record->car_location }}</p>
                            <p class="h6">{!! nl2br($record->about_car) !!} </p>
                        </div>
                    </div>                       
                
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
