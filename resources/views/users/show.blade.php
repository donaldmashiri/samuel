@extends('layouts.header')

@extends('layouts.topbar')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header bg-gradient-primary py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">Add Vehicle</h6>
                        <div class="justify-content-end">
                            <a href="{{ route('users.index') }}" class="btn btn-success btn-sm justify-content-end" > All Drivers</a>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">

                        <ul class="list-group">
                            <li class="list-group-item">Name: <strong>{{ $user->name }}</strong></li>
                        </ul>

                        @include('partials.errors')
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header font-weight-bolder">User Vehicles</div>
                                        <div class="card-body">
                                            @if($vehicles->count()> 0)
                                            <table class="table table-bordered table-sm">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Year</th>
                                                    <th scope="col">Make</th>
                                                    <th scope="col">Model</th>
                                                    <th scope="col">plate_number</th>
                                                    <th scope="col">engine_number</th>
                                                    <th scope="col">Date added</th>
                                                    <th scope="col"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($vehicles as $vehicle)
                                                    <tr>
                                                        <th>{{ $vehicle->year }}</th>
                                                        <th>{{ $vehicle->make }}</th>
                                                        <th>{{ $vehicle->model }}</th>
                                                        <th>{{ $vehicle->plate_number }}</th>
                                                        <th>{{ $vehicle->engine_number }}</th>
                                                        <th>{{ $vehicle->created_at }}</th>
{{--                                                        <td>--}}
{{--                                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-warning btn-sm">Edit</a>--}}
{{--                                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-danger btn-warning btn-sm">Delete</a>--}}
{{--                                                        </td>--}}
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                                <h3 class='text-center alert alert-danger'>No Vehicles added</h3>
                                            @endif
                                        </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                               <div class="card">
                                   <div class="card-header font-weight-bolder">Add Vehicle</div>
                                   <div class="card-body">
                                       <form method="POST" action="{{ route('vehicles.store') }}">
                                           @csrf
                                           <input type="hidden" name="user_id" value="{{ $user->id }}">
                                           <div class="row mb-3">

                                               <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Make') }}</label>

                                               <div class="col-md-6">
                                                   <input id="make" type="text" class="form-control @error('make') is-invalid @enderror" name="make" value="{{ old('make') }}" required autocomplete="make" autofocus>

                                                   @error('make')
                                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                   @enderror
                                               </div>
                                           </div>

                                           <div class="row mb-3">
                                               <label for="model" class="col-md-4 col-form-label text-md-end">{{ __('Model') }}</label>

                                               <div class="col-md-6">
                                                   <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" required autocomplete="model">

                                                   @error('model')
                                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                   @enderror
                                               </div>
                                           </div>

                                           <div class="row mb-3">
                                               <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('Year') }}</label>

                                               <div class="col-md-6">
                                                   <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" required autocomplete="national_id">

                                                   @error('year')
                                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                   @enderror
                                               </div>
                                           </div>

                                           <div class="row mb-3">
                                               <label for="engine_number" class="col-md-4 col-form-label text-md-end">{{ __('Engine Number') }}</label>

                                               <div class="col-md-6">
                                                   <input id="engine_number" type="text" class="form-control @error('engine_number') is-invalid @enderror" name="engine_number" value="{{ old('engine_number') }}" required autocomplete="engine_number">

                                                   @error('engine_number')
                                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                   @enderror
                                               </div>
                                           </div>

                                           <div class="row mb-3">
                                               <label for="plate_number" class="col-md-4 col-form-label text-md-end">{{ __('Plate Number') }}</label>

                                               <div class="col-md-6">
                                                   <input id="plate_number" type="text" class="form-control @error('plate_number') is-invalid @enderror" name="plate_number" value="{{ old('plate_number') }}" required autocomplete="plate_number">

                                                   @error('plate_number')
                                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                   @enderror
                                               </div>
                                           </div>

                                           <div class="row mb-0">
                                               <div class="col-md-6 offset-md-4">
                                                   <div class="modal-footer">
                                                       <button type="submit" class="btn btn-primary">
                                                           {{ __('Submit') }}
                                                       </button>
                                                   </div>
                                               </div>
                                           </div>
                                       </form>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->



@endsection
