@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-8">
							<h4>Admin Patients Dashboard</h4>
						</div>
						<div class="col">
							<a class="text-white" href="{{ route('admin.patients.create') }}"><button type="submit" class="btn btn-primary float-right">Add Patient</button></a>
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
							<th>Name</th>
							<th>Email</th>
							<th>Postal Address</th>
							<th>Phone Number</th>
							<th>Medical Insurance</th>
							<th>Company</th>
							<th>Policy Number</th>
							
						</thead>
						<tbody>
							@foreach($patients as $p)
							<tr>
								<td>{{ $p->name }}</td>
								<td>{{ $p->email }}</td>
								<td>{{ $p->postal_address }}</td>
								<td>{{ $p->phone_number }}</td>
								<td> @if($p->medical_insurance == 1){{ 'Yes' }} @else {{ 'No' }} @endif</td>
								
								<td>@if($companies->where('id', $p->company_id)->first() == null){{ 'N/A' }} @else {{$companies->where('id', $p->company_id)->first()->name }} @endif</td>
								
								<td>@if($p->policy_number == null){{ 'N/A' }} @else {{ $p->policy_number }} @endif</td>
								<td>
									<a href="{{ route('admin.patients.show', $p->id) }}"><button type="submit" class="btn btn-secondary float-right">View</button></a>
								</td>
								<td>
									<a href="{{ route('admin.patients.edit', $p->id) }}"><button type="submit" class="btn btn-info float-right">Edit</button></a>
								</td>
								<td>
									<a href="{{ route('admin.patients.destroy', $p->id) }}"><button type="button" class="btn btn-danger float-right">Delete</button></a>
 
                  			 	</td>
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
