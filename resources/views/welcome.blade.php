<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dwita-Binatu</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- css -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('Modernize-1.0.0/src/assets/images/logos/favicon.png') }}" />
        <link rel="stylesheet" href="{{ asset('Modernize-1.0.0/src/assets/css/styles.min.css') }}" />
        <!-- Styles -->

    </head>
    <body>
    <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed"> 
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
              <p class="text-center fw-bold">Dwita - Binatu</p>
                <a href="/login" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('assets/img/bg.jpg') }}" width="180" alt="">
                </a>
                <form>
                  <a href="/login" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Masuk</a>
                  <div class="d-flex align-items-center justify-content-center">
                  </div>
                </form>
              </div>
            </div>
            <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Developed by <a href="sayyidaziz.epizy.com" target="_blank" class="pe-1 text-primary text-decoration-underline">@sayyidaziz</a> 2023</p>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{  asset('Modernize-1.0.0/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/js/app.min.js') }}"></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/js/dashboard.js') }}"></script>
</body>
</html>
