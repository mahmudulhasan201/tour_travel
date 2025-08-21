@extends('frontend.master')
@section('content')

<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(frontend/assets/img/travel/showcase-8.webp);">
        <div class="container position-relative">
            <h1>Application Status</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <li class="current">Application Status</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Application Status Section -->
    <section id="travel-booking" class="travel-booking section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Display Status Result Below Form -->
            @if (isset($statusMessage))
            <div class="mt-4 p-3 border rounded text-center">
                @if (str_contains($statusMessage, 'approved'))
                <p class="text-success mb-0"><i class="bi bi-check-circle-fill"></i> <strong>{{ $statusMessage }}</strong></p>
                @elseif (str_contains($statusMessage, 'pending'))
                <p class="text-warning mb-0"><i class="bi bi-clock-history"></i> <strong>{{ $statusMessage }}</strong></p>
                @elseif (str_contains($statusMessage, 'rejected'))
                <p class="text-danger mb-0"><i class="bi bi-x-circle-fill"></i> <strong>{{ $statusMessage }}</strong></p>
                @else
                <p class="text-secondary mb-0"><strong>{{ $statusMessage }}</strong></p>
                @endif
            </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="booking-form-container">
                        <!--Form -->
                        <form action="{{ route('application-status') }}" method="post" class="booking-form" data-aos="fade-up" data-aos-delay="300">
                            @csrf
                            <div class="tab-content" id="bookingTabContent">

                                <!-- Step 1: Tour & Dates -->
                                <div class="form-step tab-pane fade show active" id="travel-booking-step-1" role="tabpanel">
                                    <h4 class="text-center"><strong>Check Your Application Status</strong></h4><br>

                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <label for="name">Name</label>
                                            <input name="name" id="name" class="form-control" required>
                                            </input>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="passport_no">Passport Number</label>
                                            <input type="text" name="passport_no" id="passport_no" class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="invoice">Invoice Number</label>
                                            <input type="text" name="invoice" id="invoice" class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="date">Invoice Date</label>
                                            <input type="date" name="date" id="date" class="form-control" required>
                                        </div>

                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm" style="border-radius: 6px;">
                                                Submit Inquiry
                                            </button>
                                        </div>


                                    </div>
                                </div><!-- End Step 1 -->
                            </div>
                        </form><!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section><!--End Application Status -->
</main>


@endsection