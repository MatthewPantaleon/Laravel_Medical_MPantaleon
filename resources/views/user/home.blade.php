@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

					<a href="{{ route('user.doctors.index') }}" class="text-white"><button class="btn btn-primary">Doctors</button></a>
					<a href="{{ route('user.patients.index') }}" class="text-white"><button class="btn btn-primary">Patients</button></a>
					<a href="{{ route('user.visits.index') }}" class="text-white"><button class="btn btn-primary">Visits</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
