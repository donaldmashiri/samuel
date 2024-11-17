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
                        class="card-header bg-gradient-success py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">Profile</h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col">User#</th>
                                <td> 00{{ Auth::user()->id }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Name</th>
                                <td> {{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Email</th>
                                <td> {{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Role</th>
                                <td class="text-danger font-weight-bold"> {{ Auth::user()->role }}</td>
                            </tr>
                            <tr>
                                <th scope="col">National ID</th>
                                <td class="text-dark font-weight-bold"> {{ Auth::user()->national_id }}</td>
                            </tr>
                            <tr>
                                <th scope="col">DOB</th>
                                <td class="text-dark font-weight-bold"> {{ Auth::user()->dob }}</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Modal -->



@endsection
