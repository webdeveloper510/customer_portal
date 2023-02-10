<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <style>
      .form-information {
    background: #fff;
    padding: 30px 30px 20px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-family: 'Poppins', sans-serif;
}

.Login {
    overflow: hidden;
    background: #93daf8;
    padding: 8vh;
    min-height: 100vh;
}
  </style>
  <body>
  <div class="Login">
     <div class="container">
         <div class="row">
             <div class="col"></div>
             <div class="col-md-8">
                 <div class="form-information">
                  <div class="text-center">
                    <img src="https://www.codenomad.net/customer-portal/public/logo.png" class="img-fluid  w-25"/>
                </div>
                    <form>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter Email Address">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password">
                          </div>
                        <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                      </form>
                 </div>
                
             </div>
             <div class="col"></div>
         </div>
     </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>