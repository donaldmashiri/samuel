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
                        <h6 class="m-0 font-weight-bold text-white">Add Minerals</h6>
                        <div class="justify-content-end">
                            <a href="{{ route("minerals.create") }}" class="btn btn-success btn-sm justify-content-end" > Back</a>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        @include('partials.errors')
                        <form action="{{route('minerals.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="">Name</label> <br>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>


        <!-- Modal -->


    </div>


@endsection
