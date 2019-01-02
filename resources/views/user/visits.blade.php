@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-8">
							<h4>User Visits Dashboard</h4>
						</div>
						<div class="col">
							<a href="{{ route('user.visits.create') }}" class="float-right"><button class="btn btn-primary">Add Visit</button></a>
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

                    
                    
					<table class="table table-hover">
						<thead>
							<th>Doctor</th>
							<th>Patient</th>
							<th>Date</th>
							<th>Time</th>
							<th>Duration (Minutes)</th>
							<th>Price</th>
							
						</thead>
						<tbody>
							@foreach($visits as $v)
							<tr>
								<td>{{ $doctors->where('id', $v->doctor_id)->first()->name }}</td>
								<td>{{ $patients->where('id', $v->patient_id)->first()->name }}</td>
								<td>{{ $v->date }}</td>
								<td>{{ $v->time }}</td>
								<td>{{ $v->duration }}</td>
								<td>{{ $v->price }}</td>
                   			 </tr>
                   			@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
