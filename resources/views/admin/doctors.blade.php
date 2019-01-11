@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-8">
							<h4>Admin Doctor Dashboard</h4>
						</div>
						<div class="col">
							<a class="text-white" href="{{ route('admin.doctors.create') }}"><button type="submit" class="btn btn-primary float-right">Add Doctor</button></a>
						</div>
						<div class="col">
							<a href="{{ route('admin.home') }}" class="float-right"><button class="btn btn-primary">Back To Home</button></a>
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
							<th>Start Date</th>
							
						</thead>
						<tbody>
							@foreach($doctors as $d)
							<tr>
								<td>{{ $d->name }}</td>
								<td>{{ $d->email }}</td>
								<td>{{ $d->postal_address }}</td>
								<td>{{ $d->phone_number }}</td>
								<td>{{ $d->start_date }}</td>
								<td>
									<a href="{{ route('admin.doctors.show', $d->id) }}"><button type="submit" class="btn btn-secondary float-right">View</button></a>
								</td>
								<td>
									<a href="{{ route('admin.doctors.edit', $d->id) }}"><button type="submit" class="btn btn-info float-right">Edit</button></a>
								</td>
								<td>
									<form method="post" class="toDelete"action="{{ route('admin.doctors.destroy', $d->id) }}">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										
									<a href="#" class="float-right"><button class="btn btn-danger toDelete">Delete Doctor</button></a>
									</form>
 
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
