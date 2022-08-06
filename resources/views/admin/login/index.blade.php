<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>login Admin</title>
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <br><br><br><br><br>
    <div class="container w-25 mt-4 border border-info shadow p-3 mb-5 bg-white rounded">
        <h1 class="mt-4 text-center bg-info text-white rounded p-3">Admin</h1>
        <form class="mt-4 p-3 " method="POST" action="{{route('postlogAdmin')}}">
            @csrf
            <div class="form-group">
                <label>Admin Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="adLogName" placeholder="username...">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label >Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="adLogPassword" placeholder="Password">
            </div>
            @if(isset($check))
                <div class="alert alert-danger" role="alert">
                    Đăng nhập sai !!!
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
</body>
