<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="container" class="container">
        <!--FORM SECTION-->
        <div class="row">
            <!--SIGN UP-->
            <form class="col align-items-center flex-col sign-up" id="r-form" onsubmit ="return match()" method="post" action="{{route('register')}}">
                @csrf
                <div class="form-wrapper align-items-center">
                    <div class="form sign-up">
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="text" name="username" id="name" placeholder="Tên đăng nhập" >
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="text" name="fullname" id="name" placeholder="Họ và tên" >
                        </div>
                        <div class="input-group">
                            <i class='bx bx-mail-send'></i>
                            <input type="email" name="email" id="email" placeholder="email" >

                        </div>
                        <p style="text-align:left;" id="ckemail"></p>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" name="password" id="pswd1" placeholder="Mật khẩu" >
                        </div>
                        <p style="text-align:left;" id="ckpass"></p>
                        <div class="input-group">
                            <i class='bx bxs-lock' ></i>
                            <input type="password" name="confirmPassword" id="pswd2" placeholder="Xác nhận mật khẩu" >

                        </div>
                        <p style="text-align:left;" id="ckpass2"></p>
                        <button onclick="match()">
                            Đăng kí
                        </button>
                        <p>
                            <span>
                                Tạo tài khoản mới?
                            </span>
                            <b onclick="toggle()" class="pointer">
                                Đăng nhập
                            </b>
                        </p>
                        <p>
                            <a href="{{route("home")}}">Về trang chủ</a>
                        </p>
                    </div>
                </div>
                <div class="form-wrapper">
                    <div class="social-list align-items-center sign-up">
                        <div class="align-items-center fb">
                            <i class='bx bxl-facebook'></i>
                        </div>
                        <div class="align-items-center gg">
                            <i class='bx bxl-google'></i>
                        </div>
                        <div class="align-items-center tw">
                            <i class='bx bxl-twitter'></i>
                        </div>
                        <div class="align-items-center in">
                            <i class='bx bxl-instagram-alt'></i>
                        </div>
                    </div>
                </div>

            </form>
            <!--END SIGN UP-->
            <!--SIGN IN-->
            <form class="col align-items-center flex-col sign-in" method="POST" action="{{route('postLogin')}}">
                @csrf
                <div class="form-wrapper align-items-center">
                    <div class="form sign-in">
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="text" id="namein" name="usernamein" placeholder="Tên đăng nhập">
                        </div>
                        <p style="text-align:left;" id="cknamein"></p>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" id="passin" name="passwordin" placeholder="Mật khẩu">

                        </div>
                        @if(isset($check))
                            <div class="alert alert-danger" role="alert">
                                Đăng nhập sai !!!
                            </div>
                            @endif
                        <p style="text-align:left;" id="ckpassin"></p>
                        <button>
                            Đăng nhập
                        </button>
                        <p>
                            <b>
                                Quên mật khẩu?
                            </b>

                        </p>
                        <p>
                            <span>
                                Bạn chưa có tài khoản?
                            </span>
                            <b onclick="toggle()" class="pointer">
                                Đăng kí
                            </b>
                        </p>
                        <p>
                        <a href="{{route("home")}}">Về trang chủ</a>
                        </p>
                    </div>
                </div>
                <div class="form-wrapper">
                    <div class="social-list align-items-center sign-in">
                        <div class="align-items-center fb">
                            <i class='bx bxl-facebook'></i>
                        </div>
                        <div class="align-items-center gg">
                            <i class='bx bxl-google'></i>
                        </div>
                        <div class="align-items-center tw">
                            <i class='bx bxl-twitter'></i>
                        </div>
                        <div class="align-items-center in">
                            <i class='bx bxl-instagram-alt'></i>
                        </div>
                    </div>
                </div>
            </form>
            <!--END SIGN in-->
        </div>
        <!--END FORM SECTION-->
        <!--CONTENT SECTION-->
        <div class="row content-row">
            <div class="col align-items-center flex-col ">
                <div class="text sign-in">
                    <h2>
                        Apple Store
                    </h2>
                    <p>
                        Apple think different
                    </p>
                </div>
                <div class="img sign-in">
                    <img src="img/login.png" alt="back1">
                </div>
            </div>
            <!--SIGN UP CONTENT-->
            <div class="col align-items-center flex-col" >
                <div class="img sign-up">
                    <img src="img/login.png" alt="back1">
                </div>
                <div class="text sign-up">
                    <h2>
                       Đăng kí ngay
                    </h2>
                    <p>
                        Để nhận được những ưu đãi tốt nhất !!!
                    </p>
                </div>
            </div>
            <!--END SIGN UP CONTENT-->
        </div>
        <!--END CONTENT SECTION-->
    </div>
    <Script type="text/javascript">
        function match(){
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;

            var pw1 = document.getElementById("pswd1").value;
            var pw2 = document.getElementById("pswd2").value;
            if(name == "") {
                document.getElementById("ckname").innerHTML = "**Required**";
                return false;
            }
            if(email == "") {
                document.getElementById("ckemail").innerHTML = "**Required**";
                return false;
            }

            if(pw1 == "") {
                document.getElementById("ckpass").innerHTML = "**Required**";
                return false;
            }
            if(pw1 != pw2)
            {
                document.getElementById("ckpass2").innerHTML = "**Passwords are not same**";
                return false;
            }
        }
        function matchlgin(){
            var namelgin = document.getElementById("namein").value;
            var passwordlgin = document.getElementById("passin").value;
            if(namelgin == "") {
                document.getElementById("cknamein").innerHTML = "**Required**";
                return false;
            }
            if(passwordlgin == "") {
                document.getElementById("ckpassin").innerHTML = "**Required**";
                return false;
            }
        }

        let container = document.getElementById('container')
        toggle = () =>{
            container.classList.toggle('sign-in')
            container.classList.toggle('sign-up')
        }
        setTimeout(() =>{
                container .classList.add('sign-in')
            },200)
    </script>
</body>
</html>
