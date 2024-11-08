@extends('layouts.header')

@extends('layouts.topbar')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header bg-gradient-secondary py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">Markings</h6>
                        <div class="justify-content-end">
                            <a href="" class="btn btn-success btn-sm justify-content-end"  data-bs-toggle="modal" data-bs-target="#markings"> Add New Markings</a>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        @include('partials.errors')
                        @if($markings->count() > 0)
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Color</th>
                                <th scope="col">Date Added</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($markings as $marking)
                                <tr>
                                    <th>{{ $marking->id }}</th>
                                    <td>{{ $marking->name}}</td>
                                    <td><p style="background-color: #{{ $marking->color}}">{{ $marking->color}}</p></td>
                                    <td>{{ $marking->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <h3 class='text-center alert alert-danger'>No Markings Created</h3>
                        @endif
                    </div>
                </div>
            </div>

        </div>


        <!-- Modal -->
        <div class="modal fade" id="markings" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary text-white">
                        <h5 class="modal-title " id="staticBackdropLabel">Add Color Markings</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('markings.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name Of Color') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="color" class="col-md-4 col-form-label text-md-end">{{ __('HEXI CODE') }}</label>

                                <div class="col-md-6">
                                    <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color') }}" required autocomplete="national_id">

                                    @error('color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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


@endsection
