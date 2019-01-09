@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col">
							<h3>Admin Add Doctor</h3>
						</div>
						
						
						<div class="col">
							<a href="{{ route('admin.doctors.index') }}" class="float-right"><button class="btn btn-primary">Back To Doctors</button></a>
						</div>
					</div>
					
				</div>

				
				
                <div class="card-body">
					<form method="POST" action="{{ route('admin.doctors.store') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table>
						<tr>
							<th>Doctor</th>
							
							<td><input type="text" name="name" value="{{ old('name') }}"></td>
								@if($errors->has('name'))
									<div class="error">{{ $errors->first('name') }}</div>
								@endif
							
						</tr>
						<tr>
							<th>Email</th>
							
							<td><input type="text" name="email" value="{{ old('email') }}"></td>
								@if($errors->has('email'))
									<div class="error">{{ $errors->first('email') }}</div>
								@endif
							
						</tr>
						<tr>
							<th>Postal Address</th>
							<td><input type="text" name="postal_address" value="{{ old('postal_address') }}"></td>
							@if($errors->has('postal_address'))
									<div class="error">{{ $errors->first('postal_address') }}</div>
							@endif
						</tr>
						<tr>
							<th>Phone Number</th>
							<td><input type="text" name="phone_number" value="{{ old('phone_number') }}"></td>
							@if($errors->has('phone_number'))
									<div class="error">{{ $errors->first('phone_number') }}</div>
							@endif
						</tr>
						<tr>
							<th>Start Date</th>
							<td><input type="text" name="start_date" value="{{ old('start_date') }}"></td>
							@if($errors->has('start_date'))
									<div class="error">{{ $errors->first('start_date') }}</div>
							@endif
						</tr>
					</table>
						
						<input type="submit" value="Add Doctor">
					</form>
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
