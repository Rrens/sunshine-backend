<!-- ======= Events Section ======= -->
<section id="events" class="events">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Events</h2>
            <p>Organize Your Events in our Restaurant</p>
        </div>
        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                @foreach ($data_event as $data)
                    <div class="swiper-slide">
                        <div class="row event-item">
                            <div class="col-lg-6">
                                <img src="{{ asset('/storage/' . $data->gambar) }}" class="img-fluid" alt="" />
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-5 content">
                                <h3>{{ $data->nama }}</h3>
                                <div class="price">
                                    <p>
                                        <span>Rp. {{ $data->harga }}</span>
                                    </p>
                                </div>
                                <p class="fst-italic">
                                    {{ $data->deskripsi }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- End Events Section -->
