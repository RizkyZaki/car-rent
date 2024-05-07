@extends('client.layout.main')
@php
  $benefits = json_decode(appSetting()->benefit, true);
@endphp
@section('content-client')
  <section id="blog-1" class="bg--white-300 py-100 blog-section division">
    <div class="container">


      <!-- SECTION TITLE -->
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9">
          <div class="section-title mb-70">

            <!-- Title -->
            <h2 class="s-50 w-700">Postingan</h2>

          </div>
        </div>
      </div>


      <div class="row">


        <!-- BLOG POST #1 -->
        @foreach ($post as $item)
          <div class="col-md-6 col-lg-4 mb-3">
            <div id="bp-1-1" class="blog-post wow fadeInUp">

              <!-- BLOG POST IMAGE -->
              <div class="blog-post-img mb-35">
                <img class="img-fluid r-16" src="{{ asset('storage/assets/image/' . $item->photo) }}"
                  alt="blog-post-image"
                  style="
                  height: 245px;
                  object-fit: cover;
              ">
              </div>

              <!-- BLOG POST TEXT -->
              <div class="blog-post-txt">

                <!-- Post Tag -->

                <!-- Post Link -->
                <h6 class="s-20 w-700 text-center">
                  {{-- <a href="{{ url('post/' . $item->slug) }}">{{ $item->title }}</a> --}}
                  <a href="javascript:void(0);">{{ $item->title }}</a>

                </h6>
                <table style="border-collapse: collapse;margin: auto;">
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
                <div class="blog-post-meta mt-20 text-center">
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
                {{-- <div class="row">
                  @foreach ($benefits as $benefit)
                    <div class="col-md-6">&#10003; {{ $benefit }}</div>
                  @endforeach
                </div> --}}

              </div>

            </div> <!-- END BLOG POST TEXT -->

          </div>
        @endforeach

      </div> <!-- End row -->
    </div> <!-- End container -->
  </section> <!-- END BLOG-1 -->
@endsection
