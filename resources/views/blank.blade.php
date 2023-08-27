
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="{{ asset('dist/img/systemAIRCoDeLogo.png') }}">
  <title>RPIMTS</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Your custom styles here */
    body {
       background: url('dist/img/bg.jpg') center/cover no-repeat; 
               /* background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('dist/img/bg.jpg'); */
                backdrop-filter:blur(5px);
        height: 50%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative; 
    }
            header{
                position: fixed;
                top:0;
                left:0;
                width: 100%;
                padding: 20px 100px;
                display:flex;
                justify-content: space-between;
                align-items: center;
                z-index:99;
            }
            .navigation a{
                position: relative;
                font-size:1.1em;
                color: #ffffff;
                text-decoration: none;
                font-weight: 500;
                margin-left: 40px;
            }
            .navigation a::after{
                content: '';
                position: absolute;
                left: 0;
                bottom: -6px;
                width: 100%;
                height: 3px;
                background: #fff;
                border-radius: 5px;
                transform: scaleX(0);
                transition: transform .5s;
            }
            .navigation a:hover::after{
                transform: scaleX(1);
            }

            .navigation .btnLogin-popup{
                width:130px;
                height:50px;
                background: transparent;
                border: 2px solid #ffffff;
                outline: none;
                border-radius:6px;
                cursor: pointer;
                font-size: 1.1em;
                color: #ffffff;
                font-weight: 500;
                margin-left: 40px;
                transition: .5s;
            }
            .navigation .btnLogin-popup:hover{
                background: #fff;
                color: #4d4d4d;
            }
            .wrapper{
                position: relative;
                width: 400px;
                height: 450px;
                /* background: #d3b954; */
                /* border: 2px solid ; */
                /* border-radius: 20px; */
                /* backdrop-filter:blur(5px); */
                /* box-shadow: 0 0 30px rgba(0,0,0, .5); */
                display: flex;
                justify-content: center;
                align-items:center;
            }
            .wrapper .form-box{
                width: 100%;
                padding: 30px;
            }
            .form-box h2{
                font-size: 2em;
                color: #162938;
                text-align: center;
            }
            .input-box{
                position: relative;
                width: 100%;
                height: 50px;
                border-bottom: 2px solid #162938;
                margin: 30px 0;
            }
            .input-box label{
                position: absolute;
                top: 50%;
                left:5px;
                transform: translateY(-50%);
                font-size: 1em;
                color: #162938;
                font-weight: 500;
                pointer-events: none;
                transition: .5s;
            }
            .input-box input:focus~label,
            .input-box input:valid~label{
                top: -5px;
            }
            .input-box input{
                width: 100%;
                height: 100%;
                background: transparent;
                border: none;
                outline: none;
                font-size: 1em;
                color: #162938;
                font-weight: 600;
                padding: 0 35px 0 5px;

            }
            .input-box .icon{
                position: absolute;
                right: 8px;
                font-size: 1.2em;
                color: #162938;
                line-height: 57px;
            }
            .remember-forgot{
                font-size: .9em;
                color: #162938;
                font-weight: 500;
                margin: 5px 0 15 px;
                display: flex;
                justify-content: space-between;
            }
            .remember-forgot label input{
                accent-color: #162938;
                margin-right: 1px;
            }
            .remember-forgot a{
                color: #162938;
                text-decoration: none;
            }
            .remember-forgot a:hover{
                text-decoration: underline;
            }
            .btn {
            width: 100%;
            height: 60px; /* Increased button height for aesthetic appeal */
            background: #162938 ;
            border: none;
            outline: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.2em;
            color: #fff;
            font-weight: 600;
            transition: background-color 0.3s;
            }

            .btn:hover {
            background-color: #fbc00b;
            }

            /* Center content */
            .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            }
    /* ... */
  </style>
</head>
<body>

    
<div class="container">
    <header>
    <h2 class="logo">Logo</h2>
    <nav class="navigation">
      <a href="#">Home</a>
      <a href="#">Transparency</a>
      <a href="#">Contact Us</a>
      <a href="#">Log in</a>
      <a href="#">Register</a>
    </nav>
    </header>
    <div class="center-content">
      <div class="wrapper">
        <div class="form-box login">
          <!-- Form content remains the same -->
            <h2><b>Sign in to your Account</b></h2>
            <form action="#">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" required id="email">
                    <label for="email">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <br><br>
                    <a href="#">Forgot Password?</a>
                    <br><br>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 -->

</body>
</html>
