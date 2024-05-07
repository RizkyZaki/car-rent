@extends('client.layout.main')
@php
  $benefits = json_decode(appSetting()->benefit, true);
@endphp
@section('content-client')
  <section id="hero-17" class="bg--fixed hero-section">
    <div class="container">


      <!-- HERO TEXT -->
      <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10 col-xl-9">
          <div class="hero-17-txt wow fadeInUp">

            <!-- Title -->
            <h2 class="s-60 w-700">{{ appSetting()->name }}</h2>

            <!-- Text -->
            <p class="p-xl">{{ appSetting()->header }}
            </p>

            <!-- HERO QUICK FORM -->
            <form action="{{ url('search') }}" method="GET" name="" class=" form-shadow mt-45">

              <!-- Form Inputs -->
              <div class="input-group">
                <input type="text" name="query" value="{{ request('query') }}" class="form-control email r-06"
                  placeholder="Cari Mobil" autocomplete="off" required>
                <span class="input-group-btn form-btn">
                  <button type="submit" class="btn r-06 btn--theme hover--theme submit">Cari</button>
                </span>
              </div>


            </form>

          </div>
        </div> <!-- End row -->
      </div> <!-- END HERO TEXT -->



      <!-- BRANDS CAROUSEL -->
      <div id="brands-1">
        <div class="row">
          <div class="col text-center">
            <div class="owl-carousel brands-carousel-5">

              @foreach ($category as $item)
                <!-- BRAND LOGO IMAGE -->
                <div class="brand-logo">
                  <a href="{{ url('category/' . $item->slug) }}">{{ $item->name }}<img class="img-fluid light-theme-img"
                      src="{{ asset('storage/assets/image/' . $item->image) }}" alt="brand-logo"></a>
                </div>
              @endforeach

            </div>
          </div>
        </div> <!-- End row -->
      </div> <!-- END BRANDS CAROUSEL -->


    </div> <!-- End container -->
  </section> <!-- END HERO-17 -->


  <section id="features-11" class="pt-100 features-section division">

    <div class="container">
      <h6 class="s-50 w-700 mb-3 mt-3 text-center">Daftar Harga</h6>
      <div class="row mb-5">


        <!-- BLOG POST #1 -->
        @foreach ($posts as $item)
          <div class="col-md-6 col-lg-4 mb-3">
            <div id="bp-1-1" class="blog-post wow fadeInUp">

              <!-- BLOG POST IMAGE -->
              <div class="blog-post-img mb-35">
                <img class="img-fluid r-16" src="{{ asset('storage/assets/image/' . $item->photo) }}"
                  alt="blog-post-image">
              </div>

              <!-- BLOG POST TEXT -->
              <div class="blog-post-txt">

                <!-- Post Tag -->

                <!-- Post Link -->
                <h6 class="s-20 w-700 text-center">
                  {{-- <a href="{{ url('post/' . $item->slug) }}">{{ $item->title }}</a> --}}
                  <a href="javascript:void(0);">{{ $item->title }}</a>

                </h6>
                <div class="text-center">

                  <table style="border-collapse: collapse;">
                    <tbody>
                      @foreach ($item->rent as $item)
                        <tr>
                          <td>{{ $item->rent }}</td>
                          <td>: {{ formatIDR($item->fee) }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>


                  <!-- Post Meta -->
                  <div class="blog-post-meta mt-20">
                    <ul class="post-meta-list ico-10">

                      <li>
                        <a href="javascript:void(0);" class="btn btn--theme hover--theme"><span>&#9733;</span>
                          5 </a>
                      </li>
                      <li>
                        <a href="https://wa.me/{{ appSetting()->contact_phone }}" target="_blank"
                          class="btn btn--theme hover--theme w-full"><img src="https://templatenesia.com/wa.png"
                            width="18" alt="">
                          Booking Now</a>
                      </li>
                    </ul>
                  </div>
                </div>
                {{-- <div class="row">
                  @foreach ($benefits as $benefit)
                    <div class="col-md-6">&#10003; {{ $benefit }}</div>
                  @endforeach
                </div> --}}

              </div>

            </div> <!-- END BLOG POST TEXT -->

          </div>
        @endforeach
      </div> <!-- END BLOG POST #1 -->
      <div class="text-center">
        <a href="{{ url('post') }}" class="btn mb-5 btn--theme hover--theme">Lihat Selengkapnya</a>
      </div>


      <!-- SECTION TITLE -->
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9">
          <div class="section-title mb-70">

            <!-- Title -->
            <h2 class="s-50 w-700"> Kenapa Kamu Harus Sewa Mobil di Rentalpedia
            </h2>

            <!-- Text -->

          </div>
        </div>
      </div>


      <!-- FEATURES-11 WRAPPER -->
      <div class="fbox-wrapper">
        <div class="row row-cols-1 row-cols-md-2 rows-3">


          <!-- FEATURE BOX #1 -->
          @foreach ($overrage as $item)
            <div class="col">
              <div class="fbox-11 fb-1 wow fadeInUp">

                <!-- Icon -->
                <div class="fbox-ico-wrap">
                  <img src="{{ asset('storage/assets/image/' . $item->icon) }}" width="100" alt="">
                </div> <!-- End Icon -->

                <!-- Text -->
                <div class="fbox-txt">
                  <h6 class="s-22 w-700">{{ $item->title }}</h6>
                  <p>{{ $item->description }}
                  </p>
                </div>

              </div>
            </div> <!-- END FEATURE BOX #1 -->
          @endforeach
        </div> <!-- End row -->
      </div> <!-- END FEATURES-11 WRAPPER -->


    </div> <!-- End container -->
  </section> <!-- END FEATURES-11 -->
  <section id="faqs-2" class="gr--whitesmoke pb-15 inner-page-hero faqs-section division">
    <div class="container">
      <h6 class="s-50 w-700 mb-3 mt-3 text-center">Frequently Asked Question (F.A.Q)</h6>
      <div class="row justify-content-center">
        @foreach ($faq as $item)
          <div class="col-lg-11 col-xl-10">
            <div class="accordion-wrapper">
              <ul class="accordion">


                <!-- QUESTIONS CATEGORY #1 -->
                <li class="accordion-item">


                  <!-- CATEGORY HEADER -->
                  <div class="accordion-thumb">
                    <h6>{{ $item->question }}</h6>
                  </div>


                  <!-- CATEGORY ANSWERS -->
                  <div class="accordion-panel">
                    {!! $item->answer !!}
                  </div> <!-- END CATEGORY ANSWERS -->


                </li> <!-- END QUESTIONS CATEGORY #1 -->

              </ul>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <div class="container mb-5 mt-5 pb-22">
    <h6 class="s-20 w-700">
      Kendaraan Favorit Di {{ appSetting()->name }}
    </h6>
    <div class="row mb-5">


      <!-- BLOG POST #1 -->
      @foreach ($fav_post as $item)
        <div class="col-md-6 col-lg-4">
          <div id="bp-1-1" class="blog-post wow fadeInUp">

            <!-- BLOG POST IMAGE -->
            <div class="blog-post-img mb-35">
              <img class="img-fluid r-16" src="{{ asset('storage/assets/image/' . $item->photo) }}"
                alt="blog-post-image">
            </div>

            <!-- BLOG POST TEXT -->
            <div class="blog-post-txt">

              <!-- Post Tag -->

              <!-- Post Link -->
              <h6 class="s-20 w-700">
                {{-- <a href="{{ url('post/' . $item->slug) }}">{{ $item->title }}</a> --}}
                <a href="javascript:void(0);">{{ $item->title }}</a>

              </h6>
              <ul>
                @foreach ($item->rent as $item)
                  <li>{{ $item->rent }} : {{ formatIDR($item->fee) }}</li>
                @endforeach
              </ul>
              <!-- Post Meta -->
              <div class="blog-post-meta mt-20">
                <ul class="post-meta-list ico-10">

                  <li>
                    <a href="javascript:void(0);" class="btn btn--theme hover--theme"><span>&#9733;</span>
                      5 </a>
                  </li>
                  <li>
                    <a href="https://wa.me/{{ appSetting()->contact_phone }}"
                      class="btn btn--theme hover--theme">Booking
                      Now</a>
                  </li>
                </ul>
              </div>
              <div class="row">
                @foreach ($benefits as $benefit)
                  <div class="col-md-6">&#10003; {{ $benefit }}</div>
                @endforeach
              </div>

            </div>

          </div> <!-- END BLOG POST TEXT -->

        </div>
      @endforeach
    </div> <!-- END BLOG POST #1 -->
  </div>
  <div class="container pt-4 pb-5">
    <div class="text-center mb-2">
      <h2>Brand</h2>
    </div>
    <div class="row gx-3 gx-md-4 gy-3 gy-md-4 justify-content-center align-items-center">
      @foreach ($brand as $item)
        <div class="col-3 col-md-2">
          <img class="w-100" src="{{ asset('storage/assets/image/' . $item->image) }}" alt="" />
        </div>
      @endforeach

    </div>
  </div>
  <div class="container pt-4 pb-5">
    <div class="text-center">
      <h6 class="s-20 w-700">
        {{ appSetting()->name }}
      </h6>
      <p>Kami telah diliput oleh beberapa media online ternama diantaranya adalah</p>
    </div>
    <div class="row gx-3 gx-md-4 gy-3 gy-md-4 justify-content-center align-items-center">
      @foreach ($media as $item)
        <div class="col-3 col-md-2">
          <img class="w-100" src="{{ asset('storage/assets/image/' . $item->image) }}" alt="" />
        </div>
      @endforeach

    </div>
  </div>
  <section id="banner-1" class="pt-100 banner-section">
    <div class="container">


      <!-- BANNER-1 WRAPPER -->
      <div class="banner-1-wrapper r-16">
        <div class="banner-overlay bg--05 bg--scroll">
          <div class="row">


            <!-- BANNER-1 TEXT -->
            <div class="col">
              <div class="banner-1-txt color--white">

                <!-- Title -->
                <h2 class="s-45 w-700">Hubungi Kami Sekarang</h2>

                <!-- Text -->
                <p class="p-xl">{{ appSetting()->contact_text }}</p>

                <!-- Button -->
                <a href="https://wa.me/{{ appSetting()->phone }}" class="btn r-04 btn--theme hover--tra-white">Hubungi
                  kami
                </a>

                <!-- Button Text -->
              </div>
            </div> <!-- END BANNER-1 TEXT -->


          </div> <!-- End row -->
        </div> <!-- End banner overlay -->
      </div> <!-- END BANNER-1 WRAPPER -->


    </div> <!-- End container -->
  </section> <!-- END BANNER-1 -->
@endsection
