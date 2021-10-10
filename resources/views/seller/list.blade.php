@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    My Cars
                    <span style='float:right;'><a href="{{ route('post-car') }}">Post Car</a></span>
                </div>

                <div class="card-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Make</th>
                        <th scope="col">Model</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach ($results as $result)
                    <tr>
                        <th scope="row">{{ $loop->index + $results->firstItem() }}</th>
                        <td>{{ $result->title }}</td>
                        <td>{{ $result->car_model->make->name }}</td>
                        <td>{{ $result->car_model->name }}</td>
                        <td><a href="{{ route('edit-car', ['id' => $result->id]) }}">Edit</a> | 
                            @if(!$result->deleted_at)
                            <a href="{{ route('delete-car', ['id' => $result->id]) }}" class='text-danger'>Delete</a>
                            @else
                            <a href="{{ route('restore-car', ['id' => $result->id]) }}" class='text-success'>Restore</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach 

                    @if(!$results->total()) 
                    <tr>
                        <td colspan='5' class="table-danger text-center">No Records Found</td>
                    </tr>
                    @endif
                    </tbody>
                    </table>

                    <div class="row">
                        {{ $results->links("pagination::bootstrap-4") }}
                    </div>
                                        
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
