@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					
					<div class="row">
						<div class="col">
							<h3>Admin Edit Patient</h3>
						</div>
						
						
						<div class="col">
							<a href="{{ route('admin.patients.index') }}" class="float-right"><button class="btn btn-primary">Back To Patients</button></a>
						</div>
					</div>
				
				
				</div>

				<div class="card-body">
					<form method="POST" action="{{ route('admin.patients.update', $patient->id) }}">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" name="name" value="{{ old('name', $patient->name) }}" class="form-control col-3">
							@if($errors->has('name'))
								<small class="error">{{ $errors->first('name') }}</small>
							@endif
						</div>
						

						<div class="form-group">
							<label for="email">Email:</label>
							<input type="text" name="email" value="{{ old('email', $patient->email) }}" class="form-control col-3">
							@if($errors->has('email'))
								<small class="error">{{ $errors->first('email') }}</small>
							@endif
						</div>
						
						<div class="form-group">
							<label for="postal_address">Postal Address:</label>
							<input type="text" name="postal_address" value="{{ old('postal_address', $patient->postal_address) }}" class="form-control col-3">
							@if($errors->has('postal_address'))
									<small class="error">{{ $errors->first('postal_address') }}</small>
							@endif
						</div>
						
						<div class="form-group">
							<label for="phone_number">Phone Number:</label>
							<input type="text" name="phone_number" value="{{ old('phone_number', $patient->phone_number) }}">
							@if($errors->has('phone_number'))
								<small class="error">{{ $errors->first('phone_number') }}</small>
							@endif
						</div>

						<hr>
						<div class="form-check mb-3">
							
							<input id="check" type="checkbox" name="medical_insurance" class="form-check-input" value="1" {{ (old('medical_insurance', $patient->medical_insurance) == 1) ? 'checked' : '' }} >
							<label for="medical_insurance" class="form-check-label">Medical Insurance</label>
							@if($errors->has('medical_insurance'))
								<small class="error">{{ $errors->first('medical_insurance') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="insurance_company">Insurance Company</label>
								<select name="company" class="form-control col-3">
									<option value="">Select Company</option>
									@foreach($companies as $c)
										<option value="{{ $c->id }}" {{ old('company', $c->id) == $patient->company_id ? 'selected' : '' }}>{{ $c->name }}</option>
									@endforeach
								</select>
							@if($errors->has('company'))
								<small class="error">{{ $errors->first('company') }}</small>
							@endif
						</div>
							
						<div class="form-group">
							<label for="policy_number">Policy Number:</label>
							<input type="text" name="policy_number" value="{{ old('policy_number', $patient->policy_number) }}" class="form-control col-3">
							@if($errors->has('policy_number'))
								<small class="error">{{ $errors->first('policy_number') }}</small>
							@endif
						</div>
					
						
						<button type="submit" class="btn btn-primary">Edit Patient</button>
					</form>
				</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
