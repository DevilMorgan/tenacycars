@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Used Cars</div>

                <div class="row">
                
                @foreach ($results as $result)
                    <div class="text-center col-4">
                        <div style='height:250px'>
                            @if($result->cover_photo) 
                                <!-- <img src="{{ Storage::disk('cover_photo_disk')->url($result->cover_photo) }}" class="img-thumbnail rounded" alt="..."> -->
                                <img src="{{$result->media->last()->getUrl()}}" class="img-thumbnail rounded" alt="...">
                            @else
                            <img src="{{url('/images/car-1.jpg')}}" class="img-thumbnail rounded" alt="...">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $result->title }}</h5>
                            <p class="h6">{{ $result->car_model->make->name }} / {{ $result->car_model->name }}</p>
                            <a href="{{ route('show-car', ['id' => $result->id]) }}" class="btn btn-primary" target="_blank">View Details</a>
                        </div>
                    </div>
                @endforeach

                @if(!$results->total()) 
                    <div class="card-body text-danger text-center">
                        No Records Found
                    </div>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
