<!-- ======= Chefs Section ======= -->
<section id="chefs" class="chefs">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Barista</h2>
            <p>Our Proffesional Baristas</p>
        </div>

        <div class="row">
            @foreach ($data_barista as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                        {{-- <img src="{{ asset('/storage//' . $data->foto) }}" class="img-fluid" alt="" width="60px" height="60px"> --}}
                        <img src="{{ asset('/storage/' . $data->foto) }}" alt="barista foto" width="430px">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>{{ $data->nama }}</h4>
                                <span>{{ $data->posisi }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Chefs Section -->
