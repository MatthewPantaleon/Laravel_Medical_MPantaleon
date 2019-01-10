@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					
					<div class="row">
						<div class="col">
							<h3>Admin Edit Visit</h3>
						</div>
						
						
						<div class="col">
							<a href="{{ route('admin.visits.index') }}" class="float-right"><button class="btn btn-primary">Back To Visits</button></a>
						</div>
					</div>
				
				
				</div>

				
                <div class="card-body">
					<form method="POST" action="{{ route('admin.visits.update', $visit->id) }}">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
						
							<label for="doctor">Doctor:</label>

								<select name="doctor" class="form-control col-3">
									@foreach($doctors as $d)
									<option value="{{ $d->id }}" {{ old('doctor', $d->id) == $visit->doctor_id ? 'selected' : '' }}  >{{ $d->name }}</option>
									@endforeach
								</select>
								@if($errors->has('doctor'))
									<small class="error">{{ $errors->first('doctor') }}</small>
								@endif
						</div>
						
						<div class="form-group">
							<label for="patient">Patient:</label>

								<select name="patient" class="form-control col-3">
									@foreach($patients as $p)
									<option value="{{ $p->id }}"  {{ old('patient', $visit->patient_id) == $p->id ? 'selected' : '' }}  >{{ $p->name }}</option>
									@endforeach
								</select>
								@if($errors->has('patient'))
									<div class="error">{{ $errors->first('patient') }}</div>
								@endif
						</div>
						
						<div class="form-group">
							<label for="date">Date:</label>
							<input type="date" name="date" value="{{ old('date', $visit->date) }}" class="form-control col-3">
							@if($errors->has('date'))
								<small class="error">{{ $errors->first('date') }}</small>
							@endif
						</div>
						
						<div class="form-group">
							<label for="time">Time:</label>
							<input type="time" name="time" value="{{ old('time', $visit->time) }}" class="form-control col-3">
							@if($errors->has('time'))
								<small class="error">{{ $errors->first('time') }}</small>
							@endif
						</div>
						
						<div class="form-group">
							<label for="duration">Duration:</label>
							<input type="text" name="duration" value="{{ old('duration', $visit->duration) }}" class="form-control col-3">
							@if($errors->has('duration'))
								<small class="error">{{ $errors->first('duration') }}</small>
							@endif
						</div>
						
						<div class="form-group">
							<label for="price">Price:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><b>€</b></span>
								</div>
								<input type="text" name="price" value="{{ old('price', $visit->price) }}">
							</div>
							@if($errors->has('price'))
								<small class="error">{{ $errors->first('price') }}</small>
							@endif
						</div>
						
						<button type="submit" class="btn btn-primary">Edit Visit</button>
					</form>
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
