@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-8">
							<h4>Doctor Number: {{ $doctor->id }}</h4>
						</div>
						<div class="col">
							<a href="{{ route('user.doctors.index') }}" class="text-white float-right"><button class="btn btn-primary">Back to Doctors</button></a>
						</div>
						<div class="col">
							<a href="{{ route('user.home') }}" class="float-right"><button class="btn btn-primary">Back To Home</button></a>
						</div>
					</div>
                	
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
				
					<table class="table table-hover col-4 mb-5">
						<tbody>
							<tr>
								<td><b>Name:</b></td>
								<td>{{$doctor->name}}</td>
							</tr>
							<tr>
								<td><b>Email:</b></td>
								<td>{{$doctor->email}}</td>
							</tr>
							<tr>
								<td><b>Postal Address:</b></td>
								<td>{{$doctor->postal_address}}</td>
							</tr>
							<tr>
								<td><b>Phone Number:</b></td>
								<td>{{$doctor->phone_number}}</td>
							</tr>
							<tr>
								<td><b>Start Date:</b></td>
								<td>{{$doctor->start_date}}</td>
							</tr>
						</tbody>
					</table>
                  
                  
					<h4>Visits</h4>
					
					@if(sizeof($doctor->visits) > 0)
					<table class="table table-hover">
						<thead>
							<th>Patient Name</th>
							<th>Date</th>
							<th>Time</th>
							<th>Duration (minutes)</th>
							<th>Price</th>
						</thead>
						<tbody>
						@foreach($doctor->visits as $v)
							<tr>
								<td>{{ $patients->where('id', $v->patient_id)->first()->name }}</td>
								<td>{{  $v->date }}</td>
								<td>{{  $v->time }}</td>
								<td>{{  $v->duration }}</td>
								<td>€{{ $v->price }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
                  	@else
                  	<hr>
					<h6>This doctor has no visits</h6>
                   @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
