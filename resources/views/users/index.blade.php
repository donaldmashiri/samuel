@extends('layouts.header')

@extends('layouts.topbar')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-10 col-lg-10">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header bg-gradient-secondary py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">All Drivers</h6>
{{--                        <div class="justify-content-end">--}}
{{--                            <a href="" class="btn btn-success btn-sm justify-content-end"  data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Add New Driver</a>--}}
{{--                        </div>--}}
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Names</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Date</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="font-weight-bolder text-danger">{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-primary btn-sm">View Vehicles</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

{{--    <!-- Modal -->--}}
{{--    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header bg-gradient-primary text-white">--}}
{{--                    <h5 class="modal-title " id="staticBackdropLabel">Add Driver</h5>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form method="POST" action="{{ route('users.store') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="national_id" class="col-md-4 col-form-label text-md-end">{{ __('National ID') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id">--}}

{{--                                @error('national_id')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('Date Of Birth') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('national_id') }}" required autocomplete="dob">--}}

{{--                                @error('dob')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="modal-footer">--}}
{{--                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        {{ __('Submit') }}--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


@endsection
