@extends('layouts.app')
@section('content')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Mark Review</h2>
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
                                        {{-- <strong class="amount fs-3">0 / {{ $imageCount }}</strong> --}}
                                        <strong id="completedCount" class="amount fs-3">0 / {{ $imageCount }}</strong>
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
                                        {{--<strong class="amount fs-3">0 / {{ $imageCount }}</strong> --}}
                                        <strong id="pendingCount" class="amount fs-3">{{ $imageCount }} / {{ $imageCount }}</strong>
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
                                        <strong id="disputeCount" class="amount fs-3">0 / {{ $imageCount }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 text-center">
                @if (!empty($imagePaths))
                    <img src="{{ $imagePaths[0] }}"
                         alt="Current Image"
                         id="imagePreview"
                         class="img-fluid rounded border w-100"
                         style="max-height: 80vh; object-fit: contain;">
                @else
                    <p>No images available.</p>
                @endif

                    {{-- Row with 3 components --}}
                    <div class="row mt-4">
                        {{-- Next Button --}}
                        <div class="col-md-4 d-flex align-items-center">
                            <button type="submit" class="btn btn-primary w-100" id="nextBtn">Next</button>
                        </div>

                        {{-- Dispute Button --}}
                        <div class="col-md-4 d-flex align-items-center">
                            <button type="button" class="btn btn-danger w-100" id="disputeBtn">Dispute</button>
                        </div>

                        {{-- Comment Box --}}
                        <div class="col-md-4">
                            <textarea class="form-control" id="commentBox" rows="3" placeholder="Enter comments..."></textarea>
                        </div>
                    </div>
            </div>

            <div class="col-md-4 p-0">
                <div class="row g-0">
                    <form id="markForm">
                        <div class="col-12 mb-3 p-0">
                            <img src="{{ asset('image_upload/dispute_image/image1.png') }}"
                                 class="img-fluid rounded  w-100"
                                 style="height: 20vh; object-fit: contain;">
                        </div>
                        <div class="col-12 mb-3 p-0">
                            <img src="{{ asset('image_upload/dispute_image/image2.png') }}"
                                 class="img-fluid rounded  w-100"
                                 style="height: 20vh; object-fit: contain;">
                        </div>
                        <div class="col-12 p-0">
                            <img src="{{ asset('image_upload/dispute_image/image3.png') }}"
                                 class="img-fluid rounded  w-100"
                                 style="height: 20vh; object-fit: contain;">
                        </div>
                    </form>
                </div>
            </div>

        </div>


        <!-- end: page -->
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const images = @json($imagePaths);
            const totalImages = images.length;

            let currentIndex = 0;
            let completedCount = 0;
            let disputeCount = 0;

            const imagePreview = document.getElementById('imagePreview');
            const commentBox = document.getElementById('commentBox');
            const completedCounter = document.getElementById('completedCount');
            const pendingCounter = document.getElementById('pendingCount');
            const disputeCounter = document.getElementById('disputeCount');
            const nextBtn = document.getElementById('nextBtn');
            const disputeBtn = document.getElementById('disputeBtn');

            // Focus on commentBox initially
            commentBox.focus();

            // Handle Enter key to trigger Next
            commentBox.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    handleNext();
                }
            });

            // Next button logic
            nextBtn.addEventListener('click', function () {
                handleNext();
            });

            // Dispute button logic
            disputeBtn.addEventListener('click', function () {
                const comment = commentBox.value.trim();
                if (!comment) {
                    commentBox.classList.add('is-invalid');
                    commentBox.focus();
                    return;
                }
                commentBox.classList.remove('is-invalid');
                disputeCount++;
                updateDisputeCounter();
                updatePendingCounter();
                goToNextImage();
            });

            function handleNext() {
                completedCount++;
                updateCompletedCounter();
                updatePendingCounter();
                goToNextImage();
            }

            function goToNextImage() {
                if (currentIndex < totalImages - 1) {
                    currentIndex++;
                    imagePreview.src = images[currentIndex];

                    commentBox.value = '';
                    commentBox.classList.remove('is-invalid');
                    commentBox.focus();
                } else {
                    alert('✅ All images completed!');
                }
            }

            function updateCompletedCounter() {
                completedCounter.textContent = `${completedCount} / ${totalImages}`;
            }

            function updateDisputeCounter() {
                disputeCounter.textContent = `${disputeCount} / ${totalImages}`;
            }

            function updatePendingCounter() {
                const pending = totalImages - (completedCount + disputeCount);
                pendingCounter.textContent = `${pending} / ${totalImages}`;
            }
        });
    </script>
@endpush







