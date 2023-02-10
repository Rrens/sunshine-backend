 <!-- ======= Specials Section ======= -->
 <section id="specials" class="specials">
     <div class="container" data-aos="fade-up">
         <div class="section-title">
             <h2>Specials</h2>
             <p>Check Our Specials</p>
         </div>

         <div class="row" data-aos="fade-up" data-aos-delay="100">
             <div class="col-lg-3">
                 <ul class="nav nav-tabs flex-column">

                     @foreach ($data_spesial as $data)
                         <li class="nav-item">
                             <a class="nav-link {{ $data->id == $data_spesial[0]->id ? 'active show' : '' }}"
                                 data-bs-toggle="tab" href="#tab-{{ $data->id }}">{{ $data->nama }}</a>
                         </li>
                     @endforeach
                     {{-- <li class="nav-item">
                    <a
                    class="nav-link active show"
                    data-bs-toggle="tab"
                    href="#tab-1"
                    >{{ $data->nama }}</a
                    >
                </li> --}}

                 </ul>
             </div>
             <div class="col-lg-9 mt-4 mt-lg-0">
                 <div class="tab-content">
                     @foreach ($data_spesial as $data)
                         <div class="tab-pane {{ $data->id == $data_spesial[0]->id ? 'active show' : '' }}"
                             id="tab-{{ $data->id }}">
                             <div class="row">
                                 <div class="col-lg-8 details order-2 order-lg-1">
                                     <h3>{{ $data->nama }}</h3>
                                     <p class="fst-italic">
                                         {{ $data->deskripsi }}
                                     </p>
                                 </div>
                                 <div class="col-lg-4 text-center order-1 order-lg-2">
                                     <img src="{{ asset('/storage/' . $data->gambar) }}" class="img-fluid"
                                         alt="" width="300px" height="60px">
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- End Specials Section -->
