
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/assets/dashboard/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('/assets/dashboard/img/favicon.pn')}}g">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{asset('/assets/dashboard/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('/assets/dashboard/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('/assets/dashboard/demo/demo.css')}}" rel="stylesheet" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @yield('styles')


</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{asset('/assets/dashboard/img/logo-small.png')}}">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="{{url('/user')}}" class="simple-text logo-normal">
          {{auth()->user()->name}}
          <!-- <div class="logo-image-big">
            <img src="{{asset('')}}/assets/dashboard/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{route('auth.dashboard')}}" class="nav_link">
              <i class="nc-icon nc-bank"></i>
              <p class="">Dashboard</p>
            </a>
          </li>
          <li  class="">
            <a href="{{route('posts.index')}}" class="nav_link" >
            <i class="nc-icon nc-single-copy-04"></i>
              <p>Posts</p>
            </a>
          </li>
          <li  class="">
            <a href="{{route('posts.create')}}" class="nav_link"  >
            <i class="nc-icon nc-share-66"></i>
              <p>Create Post</p>
            </a>
          </li>
          <li  class="">
            <a href="{{route('categories.index')}}" class="nav_link"  >
              <i class="nc-icon nc-align-left-2"></i>
              <p>Categories</p>
            </a>
          </li>
          <li  class="">
            <a href="{{url('messages/show')}}" class="nav_link"  >
              <i class="nc-icon nc-email-85"></i>
              <p>Messages</p>
            </a>
          </li>

          <li  class="">
            <a href="{{url('/user')}}" class="nav_link"  >
              <i class="nc-icon nc-circle-10"></i>
              <p>Profile</p>
            </a>
          </li>
          
          
         
        </ul>
      </div>
    </div>
    

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper ">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="/">KaungMinDaily </a>
            
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
           
            <ul class="navbar-nav d-flex align-items-center">
              <li>
                <a href="/" class="btn btn-info">To Posts</a>
              </li>

              
                  
                <form action="{{route('logout')}}" method="post" id="logout-form" >
                  @csrf 
                  <button class="btn btn-danger" id="logout-button" >Logout</button>
                </form>
  
                

               
              </li>

              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      @yield('content')

    </div>
     

     
    </div>
  
  <!--   Core JS Files   -->

  

  @yield('scripts')

  <script src="{{asset('/assets/dashboard/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('/assets/dashboard/js/core/popper.min.js')}}"></script>
  <script src="{{asset('/assets/dashboard/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('/assets/dashboard/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{asset('/assets/dashboard/js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('/assets/dashboard/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('/assets/dashboard/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('/assets/dashboard/demo/demo.js')}}"></script>

  

  <script>
    function SelectText(element) {
      var doc = document,
        text = element,
        range, selection;
      if (doc.body.createTextRange) {
        range = document.body.createTextRange();
        range.moveToElementText(text);
        range.select();
      } else if (window.getSelection) {
        selection = window.getSelection();
        range = document.createRange();
        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);
      }
    }
    window.onload = function() {
      var iconsWrapper = document.getElementById('icons-wrapper'),
        listItems = iconsWrapper.getElementsByTagName('li');
      for (var i = 0; i < listItems.length; i++) {
        listItems[i].onclick = function fun(event) {
          var selectedTagName = event.target.tagName.toLowerCase();
          if (selectedTagName == 'p' || selectedTagName == 'em') {
            SelectText(event.target);
          } else if (selectedTagName == 'input') {
            event.target.setSelectionRange(0, event.target.value.length);
          }
        }

        var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
          beforeContent = beforeContentChar.charCodeAt(0).toString(16);
        var beforeContentElement = document.createElement("em");
        beforeContentElement.textContent = "\\" + beforeContent;
        listItems[i].appendChild(beforeContentElement);

        //create input element to copy/paste chart
        var charCharac = document.createElement('input');
        charCharac.setAttribute('type', 'text');
        charCharac.setAttribute('maxlength', '1');
        charCharac.setAttribute('readonly', 'true');
        charCharac.setAttribute('value', beforeContentChar);
        listItems[i].appendChild(charCharac);
      }
    }
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets/dashboard-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>

 @yield('scripts')  

  <script>

    $(document).ready(function() {
      $("#logout-button").click(function() {
        $('#logout-form').submit();
      });
    });

  </script>




  <script>


    @if(Session::has('alert-success'))
      swal("Awesome!", "{{Session::get('alert-success')}}", "success");
    @endif

    @if(Session::has('alert-update'))
      swal("Awesome!", "{{Session::get('alert-update')}}", "info");
    @endif

    @if(Session::has('alert-danger'))
      swal("Awesome!", "{{Session::get('alert-danger')}}", "error");
    @endif

  </script>
</body>

</html>