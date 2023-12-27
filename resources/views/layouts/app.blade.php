@inject('SalesInvoice', 'App\Http\Controllers\SalesInvoiceController')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KARATE KARANGANYAR</title>


    <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
    <style>
      #qty
      {
          height:120%;
          font-size:12pt;
      }

      /* #loader { 
            border: 12px solid #f3f3f3; 
            border-radius: 50%; 
            border-top: 12px solid #444444; 
            width: 70px; 
            height: 70px; 
            animation: spin 1s linear infinite; 
        }  */
         
        @keyframes spin { 
            100% { 
                transform: rotate(360deg); 
            } 
        } 
         
        .center { 
            position: absolute; 
            top: 0; 
            bottom: 0; 
            left: 0; 
            right: 0; 
            margin: auto; 
        } 
    </style>
    <!-- <div id="loader" class="center"></div>  -->
    <script> 
       
        $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
    </script>  
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"> -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('Modernize-1.0.0/src/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('Modernize-1.0.0/src/assets/css/styles.min.css') }}" />
</head>
<body>

    <div id="app">
           <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{ asset('Modernize-1.0.0/src/assets/images/logos/dark-logo.svg') }}" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/home" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Menu</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/certificate" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Cetak Piagam</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/participant" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Peserta</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/winner" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Juara</span>
              </a>
            </li>
            <li hidden class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li hidden class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li hidden class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <!-- <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a> -->
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{ asset('Modernize-1.0.0/src/assets/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                        <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block" >Logout</button>
                    </form>
                    <!-- <a href="/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a> -->
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>

        <!-- main -->
            @yield('content')
       
    <!-- end main -->
        <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Developed by <a href="https://sayyidazizii.github.io" target="_blank" class="pe-1 text-primary text-decoration-underline">@sayyidaziz</a> 2023</p>
        </div>
      </div>
    </div>
    </div>
    </div> 
     <!-- Scripts -->
    <script src="{{  asset('Modernize-1.0.0/src/assets/js/app.min.js')  }}" ></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/js/dashboard.js')  }}" ></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/js/sidebarmenu.js')  }}" ></script>


    <script src="{{  asset('Modernize-1.0.0/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/js/app.min.js') }}"></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{  asset('Modernize-1.0.0/src/assets/js/dashboard.js') }}"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
   
    <script>
      function elements_add(){
        var customer_id_view           = $("#customer_id_view").val();
        $('#customer_id_view').hide();
        // $("#customer_id").val(customer_id);
        console.log(customer_id);
        $.ajax({
          type: "POST",
            url : "{{route('elements-add-sales-invoice')}}",
            data: {
                'customer_id'                   : customer_id_view, 
                '_token'                        : '{{csrf_token()}}'
            },
            success: function(msg){
                location.reload();
            }

        });
    }
    



    $(document).ready(function() {
      var customer_id           = $("#customer_id").val();
      $('.js-example-basic-single').select2();
      // $("#item_id").select2();
    });
    
    $('#customer_id_view').change(function(){
        var customer_id = $('#customer_id_view').val();
        $.ajax({
          type: "POST",
            url : "{{route('elements-add-sales-invoice')}}",
            data: {
                'customer_id'                   : customer_id, 
                '_token'                        : '{{csrf_token()}}'
            },
            success: function(msg){
                location.reload();
            }

        });
        $('#customer_id_view').hide();


    });




    function processAddArraySalesOrderItem(){
        var item_id                         = document.getElementById("item_id").value;
        var quantity			                  = document.getElementById("quantity").value;
        console.log(item_id,quantity);
        $.ajax({
            type: "POST",
            url : "{{route('sales-order-add-array')}}",
            data: {
                'item_id'                       : item_id, 
                'quantity' 			                : quantity,
                '_token'                        : '{{csrf_token()}}'
            },
            success: function(msg){
                location.reload();
            }
        });
    }




    </script>
</body>
</html>