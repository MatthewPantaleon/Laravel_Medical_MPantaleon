@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col">
							<h3>Admin Add Visit</h3>
						</div>
						
						
						<div class="col">
							<a href="{{ route('admin.patients.index') }}" class="float-right"><button class="btn btn-primary">Back To Patients</button></a>
						</div>
					</div>
					
				</div>

				
				
                <div class="card-body">
					<form method="POST" action="{{ route('admin.patients.store') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table>
						<tr>
							<th>Name</th>
							<td>
								<input type="text" name="name" value="{{ old('name') }}">
							</td>
							@if($errors->has('name'))
									<div class="error">{{ $errors->first('name') }}</div>
								@endif
						</tr>
						<tr>
							<th>Email</th>
							<td>
								<input type="text" name="email" value="{{ old('email') }}">
							</td>
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
							<th>Medical Insurance</th>
							<td><input id="check" type="checkbox" name="medical_insurance" value="1" {{ (old('medical_insurance') == 1) ? 'checked' : '' }}></td>
							@if($errors->has('medical_insurance'))
								<div class="error">{{ $errors->first('medical_insurance') }}</div>
							@endif
						</tr>
						<tr>
							<th>Insurance Company</th>
							<td>
								<select name="company">
									@foreach($companies as $c)
										<option value="{{ $c->id }}">{{ $c->name }}</option>
									@endforeach
									
								</select>
							</td>
							
							@if($errors->has('price'))
									<div class="error">{{ $errors->first('price') }}</div>
							@endif
						</tr>
						<tr>
							<th>Policy Number</th>
							<td><input type="text" name="policy_number" value="{{ old('policy_number') }}"></td>
							@if($errors->has('policy_number'))
									<div class="error">{{ $errors->first('policy_number') }}</div>
							@endif
						</tr>
					</table>
						
						<input type="submit" value="Add Patient">
					</form>
					
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>


</script>


@endsection
