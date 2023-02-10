<!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Testimonials</h2>
            <p>What they're saying about us</p>
          </div>

          <div
            class="testimonials-slider swiper"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="swiper-wrapper">
                @foreach ($datas as $data)
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      {{ $data->message }}
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <!-- <img
                      src="index/img/testimonials/testimonials-1.jpg"
                      class="testimonial-img"
                      alt=""
                    /> -->
                    <h3>{{ $data->name }}</h3>
                    <h4>Pelanggan &amp; SI</h4>
                  </div>
                </div>
                @endforeach
              <!-- End testimonial item -->
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section>
      <!-- End Testimonials Section -->
