<?php

$tBao = "";
if (isset($data["failedConnect"])) {
    $tBao = $data["failedConnect"];
}






?>

<!DOCTYPE html>
<html>

<head>
    <title>CTT Tổng hợp</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>


<body
    style="background-image: url(../public/image/background_login.jpg); background-repeat: no-repeat;  background-size: cover;">

    <div class="container"
        style="background-color: white; margin: 200px 500px ; width: 500px; height: 400px; border-radius: 10px;">
        <div class="panel panel-primary" style="display: inline-block; margin: 30px; ">
            <div class="panel-heading">
                <h2 class="text-center">Trang Đăng nhập</h2>
            </div>
            <div class="panel-body">
                <form action="checkLogin" method="post">
                     
                    <div class="form-group">
                        <label for="usr">Tên đăng nhập:</label>
                        <input required="true" type="text" class="form-control" id="usr" name="fullname" value=" "
                            style="width: 400px;">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Mật khẩu:</label>
                        <input required="true" type="password" class="form-control" id="password" name="password"
                            value="" style="width: 400px;">
                        <label for="" style=" color: red;">
                        </label>
                        <p class="failed" id="faile" style="color:red;">
                            <?php echo $tBao ?>
                        </p>
                    </div>

                    <button type="submit" class="btn btn-success" style="float: right;">Đăng nhập </button>

                </form>
                <script>

                    var check = document.getElementById('faile').innerHTML;
                    console.log(check.concat("0"));
                    if (check != 0) {
                        console.log("vaof red");
                        document.getElementById("usr").style.borderColor = "red";
                        document.getElementById("password").style.borderColor = "red";
                    }
                    else {
                        console.log("black");
                        document.getElementById("usr").style.borderColor = "no";
                        document.getElementById("password").style.borderColor = "no";
                    }

                </script>
            </div>
        </div>
    </div>
</body>

</html>