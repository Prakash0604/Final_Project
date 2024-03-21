<!doctype html>
<html lang="en">
  <head>
  	<title>Record Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="{{ asset('stuasset/css/style.css') }}">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="{{ '/dashboard' }}" class="logo">Record Management</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="{{ url('/dashboard') }}"><span class="fa fa-home mr-3"></span> Dashboard</a>
          </li>
          <li>
              <a href="{{ url('classroom/add') }}"><span class="fa fa-user mr-3"></span> Add Classroom</a>
          </li>
          <li>
              <a href="{{ url('classroom/view') }}"><span class="fa fa-list mr-3"></span>List Classroom</a>
          </li>
          <li>
              <a href="{{ url('student/add') }}"><span class="fa fa-user mr-3"></span> Add Student</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-list mr-3"></span>Student List</a>
          </li>
          <li>
            <a href="{{ url('password-change') }}"><span class="fa fa-paper-plane mr-3"></span> Settings</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-group mr-3"></span> Friends</a>
          </li>
          <li>
            <a href="{{ url('reports') }}"><span class="fa fa-group mr-3"></span> Reports</a>
          </li>
          <li>
            <a href="{{ url('logout') }}"><span class="fa fa-sign-out mr-3"></span> Logout</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->

        <div id="content" class="p-4 p-md-5 pt-5">
     @yield('content')
    </div>    
		</div>

    <script src="{{ asset('stuasset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('stuasset/js/popper.js') }}"></script>
    <script src="{{ asset('stuasset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('stuasset/js/main.js') }}"></script>
  </body>
</html>