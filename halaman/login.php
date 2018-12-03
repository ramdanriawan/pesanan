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
        
        <!--  bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
        <!-- sweetalertcdn -->
        <link rel="stylesheet" href="..\asset\node_modules\sweetalert2\dist\sweetalert2.min.css">
        <script src="..\asset\node_modules\sweetalert2\dist\sweetalert2.all.min.js" charset="utf-8"></script>
        
        <!--  script -->
        <script src="..\asset\js\app.js"></script>
    </head>
    <body>
        
        <!--  untuk halaman login -->
        <div class="container" ng-controller='loginController' style='margin-top: 15px'>
            <div class="row">
                <div class="col-sm-6 sm-offset-3">
                    <div class="card card-sm">
                        <div class="card-header">
                            <h4 class="card-title">Login</h4>
                        </div>
                        <div class="card-body">
                            <form ng-model='formLogin' ng-submit='formLoginSubmit()'>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input class='form-control' ng-model='username' placeholder="Username...">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input class='form-control' ng-model='password' placeholder="Password..." type='password'>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value='login'>
                                    <input class="btn btn-warning" type="reset" value='reset'>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>