
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Task1</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('MDB/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('MDB/css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('MDB/css/style.min.css') }}" rel="stylesheet">
    <style type="text/css">
        html,
        body,
        header,
        .carousel {
            height: 60vh;
        }

        @media (max-width: 740px) {

            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {

            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #929FBA !important;
            }
        }

    </style>
</head>

<body>

<header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">

        <div class="container">
            <a class="navbar-left" href="/">
                <strong>
                    <span style="font-family: Lucida Sans Unicode">Task1</span>
                </strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           aria-haspopup="true" aria-expanded="false">link1
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">link 2</a>
                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item">
                        <a class="nav-link"
                           aria-haspopup="true" aria-expanded="false">link 3</a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">link 4</a>
                    </li>


                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">

                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" target="_blank"  href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" target="_blank" href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <!-- Navbar -->


    <!--Main layout-->
    <main class="mt-5 pt-5">
        <div class="container">

            <!--Section: Jumbotron-->
            <section class="card blue-gradient wow fadeIn" id="intro">

                <!-- Content -->
                <div class="card-body text-white text-center py-5 px-5 my-5">

                    <h1 class="mb-4">
                        <strong>Contact Us</strong>
                    </h1>

                </div>
                <!-- Content -->
            </section>
            <!--Section: Jumbotron-->

            <!-- Material form contact -->
            <div class="card">

                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Please fill form below</strong>
                </h5>

                <table class="table">
    <thead>
    <tr>
        <th scope="col">Field Name</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($fields as $field)
        <tr>
            <td>{{$field->name}}</td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Field_{{$field->id}}">
                    Edit
                </button>

                <!-- Modal -->
                <div class="modal fade" id="Field_{{$field->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit field</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="/admin/editContactFormField/{{$field->id}}">
                                @csrf
                                <div class="modal-body">
                                    <!-- Name -->
                                    <div class="md-form mt-3">
                                        <input type="text" required="true" name="name" class="form-control">
                                        <label for="materialContactFormName">{{$field->name}}</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="Submit">Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add new field</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/admin/addContactFormField/">
                @csrf
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <input type="text" name="name" required="true"  id="orangeForm-name" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Field name</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-deep-orange">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="text-center">
    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Add new field</a>
</div>


                <!--Footer-->
                <footer class="page-footer font-small mt-4 wow fadeIn ">

                    <!--Call to action--
                    <div class="pt-4">
                        <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank"
                           role="button">Download MDB
                            <i class="fas fa-download ml-2"></i>
                        </a>
                        <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/" target="_blank" role="button">Start
                            free tutorial
                            <i class="fas fa-graduation-cap ml-2"></i>
                        </a>
                    </div>
                    /.Call to action-->

                    <hr class="my-4">

                    <!-- Footer Links -->
                    <div class="container-fluid text-center text-md-left">

                        <!-- Grid row -->
                        <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-6 mt-md-0 mt-3">

                                <!-- Content -->
                                <h2>Contact us:</h2>
                                <address class="ml-4">
                                    Email: <a href="mailto:info@info.com">info@info.com</a><br>
                                    Phone number: <a href="tel:+201234567890">+201234567890</a><br>
                                </address>


                            </div>
                            <!-- Grid column -->

                            <hr class="clearfix w-100 d-md-none pb-3">

                            <!-- Grid column -->
                            <div class="col-md-3 mb-md-0 mb-3">

                                <!-- Links -->
                                <h5 class="text-uppercase">Links</h5>

                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#!">Link 1</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 2</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 3</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 4</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 mb-md-0 mb-3">

                                <!-- Links -->
                                <h5 class="text-uppercase">Links</h5>

                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#!">Link 1</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 2</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 3</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 4</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->

                    </div>
                    <!-- Footer Links -->

                    <!--Copyright-->
                    <div class="footer-copyright py-3 text-center">
                        <p>All rights reserved © 2020</p>
                    </div>
                    <!--/.Copyright-->

                </footer>
                <!--/.Footer-->

                <!-- SCRIPTS -->
                <!-- JQuery -->
                <script type="text/javascript" src="{{asset('MDB/js/jquery-3.4.1.min.js')}}"></script>
                <!-- Bootstrap tooltips -->
                <script type="text/javascript" src="{{asset('MDB/js/popper.min.js')}}"></script>
                <!-- Bootstrap core JavaScript -->
                <script type="text/javascript" src="{{asset('MDB/js/bootstrap.min.js')}}"></script>
                <!-- MDB core JavaScript -->
                <script type="text/javascript" src="{{asset('MDB/js/mdb.min.js')}}"></script>
                <!-- Initializations -->
                <script type="text/javascript">
                    // Animations initialization
                    new WOW().init();

                </script>
</body>

</html>


