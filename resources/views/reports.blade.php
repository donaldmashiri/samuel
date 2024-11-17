@extends('layouts.header')

@extends('layouts.topbar')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header bg-gradient-dark py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">Reports</h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Content Row -->
                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-2 col-md-3 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Users</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $usersTotal }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-2 col-md-3 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Minerals</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mineralsTotal }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-caravan fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-2 col-md-3 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                    Video Detections</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $videoDetectionsTotal }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-video fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <!-- Video Row -->
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-gradient-light">Video Detection Reports</div>
                                    <div class="card-body">
                                        <div class="container">
                                            <h6>Filter Options</h6>
                                           <div class="row">
                                               <div class="col">
                                                   <input class="form-control form-group col" type="text" id="filterUserId" placeholder="User ID">
                                               </div>

                                               <div class="col">
                                                   <select class="form-control form-group col" id="filterStatus">
                                                       <option value="">Select Status</option>
                                                       <option value="inactive">Inactive</option>
                                                       <option value="active">Active</option>
                                                   </select>
                                               </div>
                                               <div class="col">
                                                   <button class="btn btn-dark btn-sm" onclick="filterTable()">Filter</button>
                                               </div>
                                           </div>
                                        </div>

                                        <table id="videoDetectionTable" class="table table-bordered table-sm">
                                            <thead class="bg-gradient-dark">
                                            <tr>
                                                <th>Detection Type</th>
                                                <th>File</th>
                                                <th>Status</th>
                                                <th>Signal Type</th>
                                                <th>Mineral</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($detects as $detect)
                                                <tr>
                                                    <td>{{ $detect->detection_type }}</td>
                                                    <td>
                                                        <a target="_blank" href="{{ asset($detect->file)}}" download>File</a>
                                                    </td>
                                                    <td>{{ $detect->status }}</td>
                                                    <td>{{ $detect->signal_type }}</td>
                                                    <td>{{ $detect->mineral }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

{{--                                        {{ $videoDetections->links() }}--}}


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

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('') }}"></script>



@endsection
