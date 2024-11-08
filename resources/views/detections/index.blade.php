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
                        <h6 class="m-0 font-weight-bold text-white">Mineral Detection - Image detection</h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        @include('partials.errors')

                        @if($vehicles->count() > 0)
                        <ul class="list-group">
                            <li class="list-group-item">

                                    <table class="table table-bordered table-sm">
                                        <thead class="bg-gradient-light">
                                        <tr>
                                            <th scope="col">Land #</th>
                                            <th scope="col">longitude</th>
                                            <th scope="col">latitude</th>
                                            <th scope="col">Date</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($vehicles as $vehicle)
                                            <tr>
                                                <th>{{ $vehicle->plate_number }}</th>
                                                <td>{{ $vehicle->make}}</td>
                                                <td>{{ $vehicle->model}}</td>
                                                <td>{{ $vehicle->created_at}}</td>
                                                <td>
                                                    <a href="{{ $vehicle->plate_number }}" class="btn btn-info btn-sm" onclick="setPlateNumber(event)">select</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            </li>
                        </ul>




                        <div class="row">
                            <div class="col-md-6">
                                <br>
                                <form action="{{route('detections.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label>Selected Land </label>
                                    <input type="text" id="plateNumberInput" name="plate_number" value="" required>

                                    <button type="submit" id="startDetectionButton" class="btn btn-primary btn-sm" disabled>Start Detection</button>

                                    <script>
                                        function setPlateNumber(event) {
                                            event.preventDefault();

                                            var plateNumber = event.target.getAttribute('href');
                                            document.getElementById('plateNumberInput').value = plateNumber;
                                            checkPlateNumber();
                                        }

                                        function checkPlateNumber() {
                                            var plateNumberInput = document.getElementById('plateNumberInput');
                                            var startDetectionButton = document.getElementById('startDetectionButton');

                                            if (plateNumberInput.value.trim() === '') {
                                                startDetectionButton.disabled = true;
                                            } else {
                                                startDetectionButton.disabled = false;
                                            }
                                        }
                                    </script>

                                </form>
                            </div>
                            <div class="col-md-6">
{{--                                @if (session('success'))--}}
                                    <div class="alert alert-success" role="alert">
                                        <div class="card">
                                            <div class="card-header bg-gradient-danger text-white">Detection Results</div>
                                            <div class="card-body">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Status</th>
                                                        <td class="text-danger fw-bolder">Not a Mineral detected</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Signal Type</th>
                                                        <td class="bg-danger text-white"> -- </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Land Position</th>
                                                        <td class="text-info fw-bolder"> --- </td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">Road Marking Color</th>
                                                        <td id="road-marking-color">---</td>
                                                    </tr>
                                                    </tbody>
                                                </table>


                                                <script>
                                                    // Function to generate a random road marking color
                                                    function generateRoadMarkingColor() {
                                                        var colors = ["Yellow", "White", "Red", "Blue"];
                                                        var randomIndex = Math.floor(Math.random() * colors.length);
                                                        return colors[randomIndex];
                                                    }

                                                    // Function to check if a wheel has crossed over into another lane
                                                    function hasCrossedOver() {
                                                        // Dummy logic, always returns true
                                                        return true;
                                                    }

                                                    // Function to generate random driver's tendencies
                                                    function generateDriverTendencies() {
                                                        var tendencies = ["Frequent Lane Crossings", "Occasional Lane Crossings", "Rare Lane Crossings"];
                                                        var randomIndex = Math.floor(Math.random() * tendencies.length);
                                                        return tendencies[randomIndex];
                                                    }

                                                    // Generate dummy data and populate the table
                                                    document.getElementById("road-marking-color").innerText = generateRoadMarkingColor();
                                                    document.getElementById("lane-crossing-alert").innerText = hasCrossedOver() ? "Yes" : "No";
                                                    document.getElementById("driver-tendencies").innerText = generateDriverTendencies();
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>


{{--                        @else--}}
{{--                            <h4 class="alert alert-danger">You do not have Vehicles Registered</h4>--}}
{{--                        @endif--}}

                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
