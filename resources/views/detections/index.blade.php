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

                        <ul class="list-group">
                            <li class="list-group-item">

                                <table class="table table-bordered table-sm">
                                    <thead class="bg-gradient-light">
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
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
