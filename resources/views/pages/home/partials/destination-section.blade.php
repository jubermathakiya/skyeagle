@if(($destinations ?? collect())->isNotEmpty())
    <!-- Destination Section -->
    <section class="section destination-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-10 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="section-header text-center">
                        <h2 class="mb-2">Search by <span
                                class="text-primary text-decoration-underline">Destinations</span> Around the World
                        </h2>
                        <p class="sub-title">Explore curated destination guides and tour packages from Sky Eagle Trip.</p>
                    </div>
                </div>
            </div>
            <div class="owl-carousel destination-slider nav-center">
                @foreach($destinations as $destination)
                    @include('pages.destinations.partials.destination-card', [
                        'destination' => $destination,
                        'class' => 'mb-4',
                    ])
                @endforeach
            </div>
            <div class="text-center view-all wow fadeInUp">
                <a href="{{ route('destinations.index') }}" class="btn btn-dark d-inline-flex align-items-center">View All Locations<i
                        class="isax isax-arrow-right-3 ms-2"></i></a>
            </div>
        </div>
    </section>
    <!-- /Destination Section -->
@endif
