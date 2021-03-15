 

<!doctype html>
<html lang="en" class="fixed left-sidebar-top">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    
    <!--load progress bar--> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="{{asset('/')}}/assets/admin/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('/')}}/assets/admin/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}/assets/admin/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('/')}}/assets/admin/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
      <link rel="stylesheet" href="{{asset('/')}}/assets/admin/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--Notification msj-->
    <script src="{{asset('/')}}/assets/admin/vendor/bootstrap_date-picker/js/bootstrap-datepicker.min.js"></script>
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{asset('/')}}/assets/admin/vendor/magnific-popup/magnific-popup.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('/')}}/assets/admin/stylesheets/css/style.css">

  
  

<title>Admin Panel</title>
</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="{{route('home')}}" class="on-click">
                        <img alt="logo" src="{{asset('/')}}/assets/admin/images/header-logo.png" />
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--SEARCH HEADERBOX-->
                <div class="header-section" id="search-headerbox">
                    <input type="text" name="search" id="search" placeholder="Search...">
                    <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                    <div class="header-separator"></div>
                </div>
                <!--NOCITE HEADERBOX-->
                
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="{{asset('/')}}/assets/admin/images/avatar/avatar_user.jpg" />
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{Auth::User()->name}}</span>
                            <span class="user-profile">{{Auth::User()->role}}</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="pages_user-profile.html"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
               <div class="header-section">
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
    <ul class="nav nav-left-lines" id="main-nav">
        <!--HOME-->
        <li class="{{request()->is('dashboard') ? 'active-item':''}}"><a href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
        <!--UI ELEMENTENTS-->
        
        <!--BRANDS-->
        <li class="has-child-item close-item {{request()->is('brand/*') ? 'open-item':''}}">
            <a><i class="fa fa-list" aria-hidden="true"></i><span>Brands</span> </a>
            <ul class="nav child-nav level-1">
                <li class="{{request()->is('brand/view-brand') ? 'active-item':''}}" ><a href="{{route('brands.view-brand')}}">Manage Brand</a></li>

                <li class="{{request()->is('brand/add-brand','edit/brand/*') ? 'active-item':''}}" ><a href="{{route('brands.add-brand')}}">Add Brands</a></li>
                
                
            </ul>
        </li>
     <!--Catagory-->
         <li class="has-child-item close-item {{request()->is('catagory/*') ? 'open-item':''}}">
            <a><i class="fa fa-list" aria-hidden="true"></i><span>Catagories</span> </a>
            <ul class="nav child-nav level-1">
                <li class="{{request()->is('catagory/view-catagory') ? 'active-item':''}}" ><a href="{{route('catagories.view-catagory')}}">Catagory Manage</a></li>

             <li class="{{request()->is('catagory/add-catagory','edit/catagory/*') ? 'active-item':''}}" ><a href="{{route('catagories.add-catagory')}}">Add Catagory</a></li>
            </ul>
        </li>
  <!-- Sub Catagory-->
  <li class="has-child-item close-item {{request()->is('subcatagory/*') ? 'open-item':''}}">
            <a><i class="fa fa-list" aria-hidden="true"></i><span>Sub Catagory</span> </a>
            <ul class="nav child-nav level-1">
                <li class="{{request()->is('subcatagory/view-subcatagory') ? 'active-item':''}}" ><a href="{{route('subcatagories.view-subcatagory')}}">Manage Sub Catagory</a></li>

                <li class="{{request()->is('subcatagory/add-subcatagory','edit/subcatagory/*') ? 'active-item':''}}" ><a href="{{route('subcatagories.add-subcatagory')}}">Add Sub Catagory</a></li>
                
                
            </ul>
        </li>

        <!-- Sub Sub Catagory-->
  <li class="has-child-item close-item {{request()->is('subsubcatagory/*') ? 'open-item':''}}">
            <a><i class="fa fa-list" aria-hidden="true"></i><span>Sub Sub Catagory</span> </a>
            <ul class="nav child-nav level-1">
                <li class="{{request()->is('subsubcatagory/view-subsubcatagory') ? 'active-item':''}}" ><a href="{{route('subsubcatagories.view-subsubcatagory')}}">Manage Sub Sub Catagory</a></li>

                <li class="{{request()->is('subsubcatagory/add-subsubcatagory','edit/subsubcatagory/*') ? 'active-item':''}}" ><a href="{{route('subsubcatagories.add-subsubcatagory')}}">Add Sub Sub Catagory</a></li>
                
                
            </ul>
        </li>

        <!-- Slider-->
              <li class="has-child-item close-item {{request()->is('slider/*') ? 'open-item':''}}">
            <a><i class="fa fa-list" aria-hidden="true"></i><span>Sliders</span> </a>
            <ul class="nav child-nav level-1">
                <li class="{{request()->is('slider/view-slider') ? 'active-item':''}}" ><a href="{{route('sliders.view-slider')}}">Manage Slider</a></li>

                <li class="{{request()->is('slider/add-slider','edit/slider/*') ? 'active-item':''}}" ><a href="{{route('sliders.add-slider')}}">Add Slider</a></li>
                
                
            </ul>
        </li>

         <!-- Product-->
            <li class="has-child-item close-item {{request()->is('product/*') ? 'open-item':''}}">
            <a><i class="fa fa-list" aria-hidden="true"></i><span>Products</span> </a>
            <ul class="nav child-nav level-1">
                <li class="{{request()->is('product/view-product') ? 'active-item':''}}" ><a href="{{route('products.view-product')}}">Manage Product</a></li>

                <li class="{{request()->is('product/add-product','edit/product/*') ? 'active-item':''}}" ><a href="{{route('products.add-product')}}">Add Product</a></li>
                
                
            </ul>
        </li>
                                <!--FORMS-->
                              
                                
                                

                                <!--DOCUMENTATION-->
                               

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">

                @yield('content')
                <!-- content HEADER -->
                <!-- ========================================================= -->
              </div>
             
             
            <!--scroll to top-->
          



     <!--scroll to top-->
     <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"><h4 style="color: red"> Sagor</h4></i></a>
        </div>
    </div>
    

<!-- Latest compiled JavaScript -->

    <script src="{{asset('/')}}/assets/admin/vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="{{asset('/')}}/assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}/assets/admin/vendor/nano-scroller/nano-scroller.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{asset('/')}}/assets/admin/javascripts/template-script.min.js"></script>
    <script src="{{asset('/')}}/assets/admin/javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
    <!--Notification msj-->
   
    <!--morris chart-->
    <!--dataTable-->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!--Gallery with Magnific popup-->
    <script src="{{asset('/')}}/assets/admin/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
 <!--Data table-->
 
     <script src="{{asset('/')}}/assets/admin/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
     <script src="{{asset('/')}}/assets/admin/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
      
     <script src="{{asset('/')}}/assets/admin/javascripts/examples/tables/data-tables.js"></script>
    <!--Examples-->
    
    <script src="{{asset('/')}}/assets/admin/vendor/pace/pace.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    



<script type="text/javascript">
  $(function(){
    $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");

Swal.fire({
  title: 'Are you sure?',
  text: "Delete This Data!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    window.location.href = link;
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

    }); 
  });

</script>

<script type="text/javascript">
    $('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    startDate: '-3d'
});
</script>

<script type="text/javascript">
    $("#catagory_id,#sub_catagory_id,#brand_id,#sub_sub_catagory_id").select2({
        placeholder:'-----------------------------Select---------------------------',
        allowclear:true
    });
</script>


<script type="text/javascript">
  
$(document).ready(function(){
  $('#image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
      $('#showimage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  });
});
</script>

<script type="text/javascript">
  
$(document).ready(function(){
  $('#thumbail').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
      $('#showimage2').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  });
});
</script>
<script type="text/javascript">
  
$(document).ready(function(){
  $('#video').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
      $('#showimage3').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  });
});
</script>



</body>

 
</html>