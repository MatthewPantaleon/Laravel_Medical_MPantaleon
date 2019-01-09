@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col">
							<h3>User Add Visit</h3>
						</div>
						
						
						<div class="col">
							<a href="{{ route('user.visits.index') }}" class="float-right"><button class="btn btn-primary">Back To Visits</button></a>
						</div>
					</div>
					
				</div>

				
				
                <div class="card-body">
					<form method="POST" action="{{ route('user.visits.store') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table>
						<tr>
							<th>Doctor</th>
							<td>
								<select name="doctor">
									@foreach($doctors as $d)
									<option value="{{ $d->id }}" {{ old('doctor') == $d->id ? 'selected' : '' }} >{{ $d->name }}</option>
									@endforeach
								</select>
								@if($errors->has('doctor'))
									<div class="error">{{ $errors->first('doctor') }}</div>
								@endif
							</td>
						</tr>
						<tr>
							<th>Patient</th>
							<td>
								<select name="patient">
									@foreach($patients as $p)
									<option value="{{ $p->id }}"{{ old('patient') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
									@endforeach
								</select>
								@if($errors->has('patient'))
									<div class="error">{{ $errors->first('patient') }}</div>
								@endif
							</td>
						</tr>
						<tr>
							<th>Date</th>
							<td><input type="text" name="date" value="{{ old('date') }}"></td>
							@if($errors->has('date'))
									<div class="error">{{ $errors->first('date') }}</div>
							@endif
						</tr>
						<tr>
							<th>Time</th>
							<td><input type="text" name="time" value="{{ old('time') }}"></td>
							@if($errors->has('time'))
									<div class="error">{{ $errors->first('time') }}</div>
							@endif
						</tr>
						<tr>
							<th>Duration</th>
							<td><input type="text" name="duration" value="{{ old('duration') }}"></td>
							@if($errors->has('duration'))
									<div class="error">{{ $errors->first('duration') }}</div>
							@endif
						</tr>
						<tr>
							<th>Price</th>
							<td><input type="text" name="price" value="{{ old('price') }}"></td>
							@if($errors->has('price'))
									<div class="error">{{ $errors->first('price') }}</div>
							@endif
						</tr>
					</table>
						
						<input type="submit" value="Add Visit">
					</form>
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
