<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Gallery</h2>
            <p>Some photos from Our Cafe</p>
        </div>
    </div>

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0">
            @foreach ($data_galery as $data)
                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('/storage/' . $data->gambar) }}" class="gallery-lightbox"
                            data-gall="gallery-item">
                            <img src="{{ asset('/storage/' . $data->gambar) }}" alt="" class="img-fluid" />
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Gallery Section -->
