<!-- ======= Menu Section ======= -->
<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Menu</h2>
            <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="menu-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($data_jenis_menu as $data)
                        <li data-filter=".filter-{{ $data->jenis }}">{{ $data->jenis }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

            @foreach ($data_menu as $data)
                <div class="col-lg-6 menu-item filter-{{ $data->jenis }}">
                    <img src="{{ asset('/storage//' . $data->gambar) }}" class="menu-img" alt="" width="60px"
                        height="60px">
                    <div class="menu-content mt-3">
                        <a href="#">{{ $data->nama }}</a><span>Rp. {{ $data->harga }}</span>
                    </div>
                    {{-- <div class="menu-ingredients">Air, Teh, Gula</div> --}}
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Menu Section -->
