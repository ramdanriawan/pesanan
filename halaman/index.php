<!DOCTYPE html>
<html lang="en" dir="ltr" ng-app='app'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pesanan</title>
        <!--  css -->
        <link rel="stylesheet" href="..\asset\css\style.css">

        <!--  jquery -->
        <script src="..\asset\node_modules\jquery\dist\jquery.min.js" charset="utf-8"></script>

        <!--  angular -->
        <script src="..\asset\node_modules\angular\angular.min.js" charset="utf-8"></script>
        <script src="..\asset\node_modules\angular-route\angular-route.min.js" charset="utf-8"></script>
        <script src="..\asset\node_modules\angular-sanitize\angular-sanitize.min.js" charset="utf-8"></script>

        <!--  bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <!-- sweetalertcdn -->
        <link rel="stylesheet" href="..\asset\node_modules\sweetalert2\dist\sweetalert2.min.css">
        <script src="..\asset\node_modules\sweetalert2\dist\sweetalert2.all.min.js" charset="utf-8"></script>

        <!-- fontawesome -->
        <link rel="stylesheet" href="..\asset\node_modules\@fortawesome\fontawesome-free\css\all.min.css">
        <script src="..\asset\node_modules\@fortawesome\fontawesome-free\js\all.min.js" charset="utf-8"></script>

        <!-- serialize -->
        <script src="..\asset\node_modules\form-serialize\serialize.js"></script>

        <!--  script -->
        <script src="..\asset\js\app.js"></script>
    </head>
    <body>

        <!--  untuk halaman index -->
        <div style='margin:5px'>
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-6 md-offset-3">
                        <span class='text-center'>
                            <a href='#!item' class='btn btn-info btn-sm'>Item</a>
                            <a href='#!order' class='btn btn-success btn-sm'>Order</a>
                            <!-- <a href='logout.php' class='btn btn-secondary btn-sm'>Logout</a> -->
                        </span>
                    </div>
                </div>
            </div>

            <!--  halaman akan tampil disini -->
            <div ng-view></div>
        </div>

    </body>
</html>
