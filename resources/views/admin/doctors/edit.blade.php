@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					
					<div class="row">
						<div class="col">
							<h3>Admin Edit Doctor</h3>
						</div>
						
						
						<div class="col">
							<a href="{{ route('admin.doctors.index') }}" class="float-right"><button class="btn btn-primary">Back To Doctors</button></a>
						</div>
					</div>
				
				
				</div>

				
                <div class="card-body">
					<form method="POST" action="{{ route('admin.doctors.update', $doctor->id) }}">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                  
						<!-- Name -->
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" name="name" value="{{ old('name', $doctor->name) }}" class="form-control col-3">
							@if($errors->has('name'))
								<small class="error">{{ $errors->first('name') }}</small>
							@endif
						</div>

						
						<!-- Email -->
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="text" name="email" value="{{ old('email', $doctor->email) }}" class="form-control col-3">
							@if($errors->has('email'))
								<small class="error">{{ $errors->first('email') }}</small>
							@endif
						</div>

						<!-- Postal Address -->
						<div class="form-group">
						<label for="postal_address">Postal Address</label>
							<input type="text" name="postal_address" value="{{ old('postal_address', $doctor->postal_address) }}" class="form-control col-3">
							@if($errors->has('postal_address'))
									<small class="error">{{ $errors->first('postal_address') }}</small>
							@endif
						</div>
						
						<!-- Phone Number -->
						<div class="form-group">
							<label>Phone Number</label>
							<input type="text" name="phone_number" value="{{ old('phone_number', $doctor->phone_number) }}" class="form-control col-3">
							@if($errors->has('phone_number'))
									<small class="error">{{ $errors->first('phone_number') }}</small>
							@endif
						</div>
						
						<!-- Start Date -->
						<div class="form-group">
							<label>Start Date</label>
							<input type="date" name="start_date" value="{{ old('start_date', $doctor->start_date) }}" class="form-control col-3">
							@if($errors->has('start_date'))
									<small class="error">{{ $errors->first('start_date') }}</small>
							@endif
						</div>
						
						
						<button type="submit" class="btn btn-primary">Edit Doctor</button>
					</form>
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
