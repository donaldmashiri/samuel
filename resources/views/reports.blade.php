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
                                                    Vehicles</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $vehiclesTotal }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-caravan fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-2 col-md-3 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Color Markings
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $markingsTotal }}</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                 style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

{{--                            <!-- Pending Requests Card Example -->--}}
                            <div class="col-xl-2 col-md-3 mb-4">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Camera Detections</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $cameraDetectionsTotal }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-camera fa-2x text-gray-300"></i>
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
                                                   <input class="form-control form-group col" type="text" id="filterPlateNumber" placeholder="Plate Number">
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
                                                <th scope="col">User ID</th>
                                                <th scope="col">Plate #</th>
                                                <th scope="col">Detection Type</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Signals Type</th>
                                                <th scope="col">Lane</th>
                                                <th scope="col">Wheels Crossed</th>
                                                <th scope="col">Markings Color</th>
                                                <th scope="col">Cross Alert</th>
                                                <th scope="col">Driver tendencies</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($videoDetections as $videoDetection)
                                                <tr>
                                                    <td>00{{ $videoDetection->user_id }}</td>
                                                    <td>{{ $videoDetection->plate_number }}</td>
                                                    <td class="text-danger">Video Detection</td>
                                                    <td>{{ $videoDetection->status }}</td>
                                                    <td>{{ $videoDetection->signal_type }}</td>
                                                    <td>{{ $videoDetection->lane_position }}</td>
                                                    <td>{{ $videoDetection->wheel_crossed }}</td>
                                                    <td>{{ $videoDetection->marking_color }}</td>
                                                    <td>{{ $videoDetection->cross_alert }}</td>
                                                    <td>{{ $videoDetection->driver_tendencies }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

{{--                                        {{ $videoDetections->links() }}--}}

                                        <script>
                                            function filterTable() {
                                                var userId = document.getElementById('filterUserId').value.toLowerCase();
                                                var plateNumber = document.getElementById('filterPlateNumber').value.toLowerCase();
                                                var status = document.getElementById('filterStatus').value.toLowerCase();
                                                var table = document.getElementById('videoDetectionTable');
                                                var rows = table.getElementsByTagName('tr');

                                                for (var i = 0; i < rows.length; i++) {
                                                    var userIdCell = rows[i].getElementsByTagName('td')[0];
                                                    var plateNumberCell = rows[i].getElementsByTagName('td')[1];
                                                    var statusCell = rows[i].getElementsByTagName('td')[3];

                                                    if (userIdCell && plateNumberCell && statusCell) {
                                                        var userIdValue = userIdCell.textContent || userIdCell.innerText;
                                                        var plateNumberValue = plateNumberCell.textContent || plateNumberCell.innerText;
                                                        var statusValue = statusCell.textContent || statusCell.innerText;

                                                        if ((userIdValue.toLowerCase().indexOf(userId) > -1 || userId === '') &&
                                                            (plateNumberValue.toLowerCase().indexOf(plateNumber) > -1 || plateNumber === '') &&
                                                            (statusValue.toLowerCase() === status || status === '')) {
                                                            rows[i].style.display = '';
                                                        } else {
                                                            rows[i].style.display = 'none';
                                                        }
                                                    }
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Camera Row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-gradient-dark">Camera Detection Reports</div>
                                    <div class="card-body">

                                        <table id="cameraDetectionTable" class="table table-bordered table-sm">
                                            <thead class="bg-gradient-light">
                                            <tr>
                                                <th scope="col">User ID</th>
                                                <th scope="col">Plate #</th>
                                                <th scope="col">Detection Type</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Signals Type</th>
                                                <th scope="col">Lane</th>
                                                <th scope="col">Wheels Crossed</th>
                                                <th scope="col">Markings Color</th>
                                                <th scope="col">Cross Alert</th>
                                                <th scope="col">Driver tendencies</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cameraDetections as $cameraDetection)
                                                <tr>
                                                    <th>00{{ $cameraDetection->user_id }}</th>
                                                    <th>{{ $cameraDetection->plate_number }}</th>
                                                    <th class="text-success">Camera Detection</th>
                                                    <th>{{ $cameraDetection->status }}</th>
                                                    <th>{{ $cameraDetection->signal_type }}</th>
                                                    <th>{{ $cameraDetection->lane_position }}</th>
                                                    <th>{{ $cameraDetection->wheel_crossed }}</th>
                                                    <th>{{ $cameraDetection->marking_color }}</th>
                                                    <th>{{ $cameraDetection->cross_alert }}</th>
                                                    <th>{{ $cameraDetection->driver_tendencies }}</th>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{ $cameraDetections->links() }}

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
