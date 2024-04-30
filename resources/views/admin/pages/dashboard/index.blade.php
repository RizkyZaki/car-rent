@extends('admin.layout.main')

@section('content-admin')
  <style>
    .bg-custom {
      background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%) !important;
    }
  </style>
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
          <div class="nk-block-between">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">Dashboard</h3>
              <div class="nk-block-des text-soft">
                <p>Selamat Datang Di Dashboard Rentalpedia</p>
              </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
              <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                    class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                  <ul class="nk-block-tools g-3">
                    <li>
                      <div class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                          data-bs-toggle="dropdown"><em
                            class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span
                              class="d-none d-md-inline">Last</span> 30 Days</span><em
                            class="dd-indc icon ni ni-chevron-right"></em></a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <ul class="link-list-opt no-bdr">
                            <li><a href="#"><span>Last 30 Days</span></a></li>
                            <li><a href="#"><span>Last 6 Months</span></a></li>
                            <li><a href="#"><span>Last 1 Years</span></a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em
                          class="icon ni ni-reports"></em><span>Reports</span></a></li>
                  </ul>
                </div>
              </div>
            </div><!-- .nk-block-head-content -->
          </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <ul class="row g-gs preview-icon-svg">

          <li class="col-lg-3 col-sm-6 col-12">
            <div class="card bg-primary h-100">
              <div class="nk-ecwg nk-ecwg1">
                <div class="card-inner">
                  <div class="card-title-group">
                    <div class="card-title">
                      <h6 class="title text-white">Total</h6>
                    </div>
                    <div class="card-tools">
                      <a href="{{ url('dashboard/master/category') }}" class="text-white">Lihat Semua</a>
                    </div>
                  </div>
                  <div class="data">
                    <div class="amount text-white">{{ $countCat }}</div>
                    <div class="info text-white">Category</div>
                  </div>


                </div><!-- .card-inner -->

              </div><!-- .nk-ecwg -->
            </div>
          </li><!-- .col -->
          <li class="col-lg-3 col-sm-6 col-12">
            <div class="card bg-success h-100">
              <div class="nk-ecwg nk-ecwg1">
                <div class="card-inner">
                  <div class="card-title-group">
                    <div class="card-title">
                      <h6 class="title text-white">Total</h6>
                    </div>
                    <div class="card-tools">
                      <a href="{{ url('dashboard/inform/post-car') }}" class="text-white">Lihat Semua</a>
                    </div>
                  </div>
                  <div class="data">
                    <div class="amount text-white">{{ $countPost }}</div>
                    <div class="info text-white">Post</div>
                  </div>
                </div><!-- .card-inner -->

              </div><!-- .nk-ecwg -->
            </div>
          </li><!-- .col -->
          <li class="col-lg-3 col-sm-6 col-12">
            <div class="card bg-danger h-100">
              <div class="nk-ecwg nk-ecwg1">
                <div class="card-inner">
                  <div class="card-title-group">
                    <div class="card-title">
                      <h6 class="title text-white">Total</h6>
                    </div>
                    <div class="card-tools">
                      <a href="{{ url('dashboard/inform/blog') }}" class="text-white">Lihat Semua</a>
                    </div>
                  </div>
                  <div class="data">
                    <div class="amount text-white">{{ $countBlog }}</div>
                    <div class="info text-white">Blog</div>
                  </div>

                </div><!-- .card-inner -->

              </div><!-- .nk-ecwg -->
            </div>
          </li><!-- .col -->
          <li class="col-lg-3 col-sm-6 col-12">
            <div class="card bg-warning h-100">
              <div class="nk-ecwg nk-ecwg1">
                <div class="card-inner">
                  <div class="card-title-group">
                    <div class="card-title">
                      <h6 class="title text-white">Total</h6>
                    </div>
                    <div class="card-tools">
                      <a href="{{ url('dashboard/master/faq') }}" class="text-white">Lihat Semua</a>
                    </div>
                  </div>
                  <div class="data">
                    <div class="amount text-white">{{ $countFaq }}</div>
                    <div class="info text-white">Faq</div>
                  </div>

                </div><!-- .card-inner -->

              </div><!-- .nk-ecwg -->
            </div>
          </li><!-- .col -->


        </ul><!-- .row -->
      </div>
    </div>
  </div>
  @push('customJs')
    <script src="{{ asset('admin/logic/dashboard.js') }}"></script>
  @endpush
@endsection
