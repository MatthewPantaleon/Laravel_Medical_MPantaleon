@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-8">
							<h4>Patient Number: {{ $patient->id }}</h4>
						</div>
						<div class="col">
							<a href="{{ route('user.patients.index') }}" class="text-white float-right"><button class="btn btn-primary">Back to Patients</button></a>
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
								<td>{{$patient->name}}</td>
							</tr>
							<tr>
								<td><b>Email:</b></td>
								<td>{{$patient->email}}</td>
							</tr>
							<tr>
								<td><b>Postal Address:</b></td>
								<td>{{$patient->postal_address}}</td>
							</tr>
							<tr>
								<td><b>Phone Number:</b></td>
								<td>{{$patient->phone_number}}</td>
							</tr>
							<tr>
								<td><b>Name:</b></td>
								<td>@if($patient->medical_insurance == 1){{ 'Yes' }} @else {{ 'No' }} @endif</td>
							</tr>
							
						</tbody>
					</table>
                  
                  
					<h4>Visits</h4>
					
					@if(sizeof($patient->visits) > 0)
					<table class="table table-hover">
						<thead>
							<th>Doctor Name</th>
							<th>Date</th>
							<th>Time</th>
							<th>Duration (minutes)</th>
							<th>Price</th>
						</thead>
						<tbody>
						@foreach($patient->visits as $v)
							<tr>
								<td>{{ $doctors->where('id', $v->doctor_id)->first()->name }}</td>
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
					<h6>This patient has no visits</h6>
                   @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
