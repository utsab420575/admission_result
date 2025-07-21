@extends('layouts.app')
@section('content')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Dashboard</h2>
            <div class="right-wrapper text-end">
                {{--<ol class="breadcrumbs">
                    <li>
                        <a href="index.html">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    --}}{{--<li><span>Layouts</span></li>
                    <li><span>Dark Header</span></li>--}}{{--
                </ol>--}}
                {{--<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>--}}
            </div>
        </header>
        <!-- start: page -->
        <div class="row">
            <!-- Completed Card -->
            <div class="col-sm-12 col-md-6 col-xl-4 ">
                <section class="card card-featured-left card-featured-success mb-3">
                    <div class="card-body">
                        <div class="widget-summary d-flex align-items-center">
                            <!-- Icon Column -->
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-success">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>

                            <!-- Text Column -->
                            <div class="widget-summary-col flex-grow-1 d-flex align-items-center" style="padding-left: 100px;">
                                <div class="summary text-center">
                                    <h4 class="title mb-1 fs-4">Completed</h4> {{-- Bootstrap fs-4 for larger title --}}
                                    <div class="info">
                                        <strong class="amount fs-3">0 / {{ $imageCount }}</strong> {{-- Larger count --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Pending Card -->
            <div class="col-sm-12 col-md-6 col-xl-4">
                <section class="card card-featured-left card-featured-warning mb-3">
                    <div class="card-body">
                        <div class="widget-summary d-flex align-items-center">
                            <!-- Icon Column -->
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-warning">
                                    <i class="fas fa-hourglass-half"></i>
                                </div>
                            </div>

                            <!-- Text Column -->
                            <div class="widget-summary-col flex-grow-1 d-flex align-items-center" style="padding-left: 100px;">
                                <div class="summary text-center">
                                    <h4 class="title mb-1 fs-4">Pending</h4> {{-- Bootstrap fs-4 for larger title --}}
                                    <div class="info">
                                        <strong class="amount fs-3">0 / {{ $imageCount }}</strong> {{-- Larger count --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Dispute Card -->
            <div class="col-sm-12 col-md-6 col-xl-4">
                <section class="card card-featured-left card-featured-danger mb-3">
                    <div class="card-body">
                        <div class="widget-summary d-flex align-items-center">
                            <!-- Icon Column -->
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-danger">
                                    <i class="fas fa-gavel"></i> {{-- Larger icon --}}
                                </div>
                            </div>

                            <!-- Text Column -->
                            <div class="widget-summary-col flex-grow-1 d-flex align-items-center" style="padding-left: 100px;">
                                <div class="summary text-center">
                                    <h4 class="title mb-1 fs-4">Dispute</h4> {{-- Bootstrap fs-4 for larger title --}}
                                    <div class="info">
                                        <strong class="amount fs-3">0 / {{ $imageCount }}</strong> {{-- Larger count --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <button class="btn btn-primary px-5 py-4 fs-4">
                    Start Execution <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </div>
            <div class="col-md-4"></div>

        </div>

        <!-- end: page -->
    </section>
@endsection
