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
							<a href="{{ route('admin.visits.index') }}" class="float-right"><button class="btn btn-primary">Back To Visits</button></a>
						</div>
					</div>
					
				</div>

				
				
                <div class="card-body">
					<form method="POST" action="{{ route('admin.visits.store') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<!-- Doctor -->
						<div class="form-group">
							<label for="doctor">Doctor:</label>

								<select name="doctor" class="form-control col-3">
									<option value="none">Select a doctor</option>
									@foreach($doctors as $d)
									<option value="{{ $d->id }}" {{ old('doctor') == $d->id ? 'selected' : '' }} >{{ $d->name }}</option>
									@endforeach
								</select>
							@if($errors->has('doctor'))
								<small class="error">{{ $errors->first('doctor') }}</small>
							@endif
						</div>
						
						<!-- Patient -->
						<div class="form-group">
							<label for="patient">Patient:</label>
							<td>
								<select name="patient" class="form-control col-3">
									<option value="none">Select a patient</option>
									@foreach($patients as $p)
									<option value="{{ $p->id }}"{{ old('patient') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
									@endforeach
								</select>
								@if($errors->has('patient'))
									<small class="error">{{ $errors->first('patient') }}</small>
								@endif
						</div>
								
						<!-- Date -->
						<div class="form-group">
							<label for="date">Date:</label>
							<input type="date" name="date" value="{{ old('date') }}" class="form-control col-3">
							@if($errors->has('date'))
									<small class="error">{{ $errors->first('date') }}</small>
							@endif
						</div>
						
						<!-- Time -->
						<div class="form-group">
							<label for="time">Time:</label>
							<input type="time" name="time" value="{{ old('time') }}" class="form-control col-3">
							@if($errors->has('time'))
								<small class="error">{{ $errors->first('time') }}</small>
							@endif
						</div>
						
						<!-- Duration -->
						<div class="form-group">
							<label for="duration">Duration:</label>
							<input type="text" name="duration" value="{{ old('duration') }}" class="form-control col-3">
							@if($errors->has('duration'))
									<small class="error">{{ $errors->first('duration') }}</small>
							@endif
						</div>
						
						<!-- Price -->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><b>€</b></span>
								</div>
								<input type="text" name="price" value="{{ old('price') }}">
							</div>
							@if($errors->has('price'))
									<small class="error">{{ $errors->first('price') }}</small>
							@endif
						</div>
						
						
						<button type="submit" class="btn btn-primary">Add Visit</button>
					</form>
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
