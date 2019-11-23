<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="keywords" content="HTML,CSS,JavaScript,PHP,MySQL"/>
	<meta name="description" content="Login Page for Soical"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
	<!-- Latest compiled JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/style.css')}}"> 
	


</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="#" id="login-form">
          <div class="head">Login</div>
          <div class="social">
            <h4>Connect with</h4>
            <ul>
              <li> 
              <a href="" class="facebook">
                <span class="fa fa-facebook"></span>
              </a>
              </li>
              <li>
                <a href="" class="twitter">
                  <span class="fa fa-twitter"></span>
                </a>
              </li>
              <li>
                <a href="" class="google-plus">
                  <span class="fa fa-google-plus"></span>
                </a>
              </li>
            </ul>
          </div>
    
          <div class="divider">
            <span>or</span>
          </div>
            
          <div class="input-field">
            <label for="email">Email</label>
            <input type="email" name="email" required="email" />
            <label for="password">Password</label> 
            <input type="password" name="password" required/>
            <input type="submit" value="Login" />
            <p class="text-p">Don't have an account? <a href="#">Sign up</a></p>
          </div>
        </form>        
      </div>
    </div>
  </div>
</body>
</html>