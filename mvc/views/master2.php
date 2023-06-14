<?php

$userName = "";
$view = "";
$theLoai = "";
$userManagement = [];
$avatar = "";

if (isset($data['user'])) {
   
    while ($result = sqlsrv_fetch_array($data['user'], SQLSRV_FETCH_ASSOC)) {
        $userManagement = $result;
    }
    if (isset($userManagement['userName'])) {
        $userName = $userManagement['userName'];
        $_SESSION['theLoai'] = $userManagement['theLoai'];
        $_SESSION['id_user'] = $userManagement['maUser'];
        $_SESSION['pass'] = $userManagement['passWord'];
        $_SESSION['avatar'] = "avatar_default.jpg";
        if($userManagement['icon'] != null){
            $_SESSION['avatar'] = $userManagement['icon'];
        }
       
       
        
        if (isset($data['dataSubject'])) {
            
            $_SESSION['dataSubject'] = $data['dataSubject'];
        }
        $theLoai = $_SESSION['theLoai'];
        
         
        if ($userManagement['theLoai'] == 1 ) {
            $view = "AdminView";

        }
        else if ($userManagement['theLoai'] == 2) { 
            header('location: AV_pointManagement');
        }

        else  {
            $view = "GeneralView";
        }
        $_SESSION['userName'] = $userName;
    }

}

$test = 3;
$test2 = "Admin";
if (isset($_SESSION['userName'])) {
    
} else {
    $_SESSION['userName'] = "";
}
if ($theLoai == 1 || isset($_SESSION['theLoai'])){
    if($_SESSION['theLoai'] ==  1 || $_SESSION['theLoai'] == 2){

        $test = 1;
    }
    
}
else {
    $test = 3;
}

?>
<?php if ($view != "AdminView") {
    if (isset($data['DV_view']) and $data['DV_view'] != "") {
        $view = $data['DV_view'];
    }
?>


<?php } ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CTT ĐH TH</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='../public/css/master2.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='../public/css/dichvu.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../public/css/back.css'>
    <?php if ($view == "GeneralView") { ?>
    <script src='../public/js/master2.js'> </script>
    <?php } ?>
    <script src="../public/js/ajax.js"></script>
    <link rel='stylesheet' type='text/css' media='screen'
        href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css'>


</head>

<Style>
    .nut:hover .editPass{      
        display: block;
        
    }
    .editPass{
        width: 140px;
        height: 40px;
        position: absolute;
        z-index: 1;
        border-radius: 7px;
        margin-left: -325px;
        margin-top: -80px;
        background-color: #8B0000;
        display: none;
        border: none;
        color: white;
    }
</Style>
<?php if(isset($_SESSION['id_user']))  {
    echo '<Script>
        function EditPass(){
        console.log("test");
       
            location.href= "EditPass?id=' . $_SESSION['id_user'] . ' "}
    
    </Script>
    ';
}?>

<body>


    <!--------------------------------- logo -------------------------------->
    <div class="logo" id="">
        <div class="tieude" style="    font-size: 30px;
                                    color: white;
                                    margin: 30px 29px;
                                    margin-left: 106px;
                                    ">
            <i class="fa-brands fa-slack"></i>
            ĐẠI HỌC TỔNG HỢP
        </div>

        <div style="display: flex;">
            <div class="Button" style="display: grid;">
                <button style="margin-left: 780px; margin-top: 27px;width: 140px; height: 40px;margin-bottom: 6px;"
                    class="login" type="button" id="parent"> <a id="login_link" href="login"> Đăng Nhập</a>
                    <?php 
                     echo $_SESSION['userName']; ?>
                </button>
                <?php if (isset($_SESSION['theLoai']) != "") { ?>
                <button onclick="" style="    width: 140px; margin-left: 780px;border-radius: 7px; height: 37px;margin-bottom: 50px;background-color: #8B0000;border:none ">
                <a style="color: white; text-decoration: none;" href="out"; onclick="return confirm('Are you sure logout?')">Đăng xuất </a></button>
                <?php } ?>
                <?php if($theLoai == ""){ ?>
                    <style>
                        .logo .login{
                            margin-top: 40px;
                        }
                    </style>

                <?php } ?>

            </div>
            <?php if ($_SESSION['userName'] != "") {  ?>
            <script>
                var parent = document.getElementById("parent");
                var child = document.getElementById("login_link");
                parent.removeChild(child);
            </script>
            <div class="nut">
                <a href="">
               
                    <img style="margin-left: -198px; margin-top: 40px; width: 50px;height :50px ; border-radius: 40px"
                        src="../public/image/<?php echo $_SESSION['avatar'];?>" class="avatar" alt=""></a>
                    <button class="editPass" onclick="EditPass()">Đổi mật khẩu </button>
            </div>

            <?php } ?>

        </div>

        <div class="search" style="margin-left: 40px;">
            <?php if ($theLoai == 3 || $test == 3) { ?>
            <!-- <form action="" method="post" class="search">
                <input class=" timkiem" placeholder="tim kiếm" onclick="" name="txtsearch"
                    style="left: -152px;"></input>
            </form> -->

            <?php } ?>
        </div>
    </div>

    <?php if ($theLoai == 3 || $test == 3) { ?>
    <!-----------------------------------menu ------------------------->
    <Style>
        .menu ul li a:hover {
            border-bottom: 6px solid blue;
            padding-bottom: 4px;
        }
        .menu ul li a.menu1.active {
            background-color: blue;
        }

        .menu ul li a:visited {
           transition: cubic-bezier(0.075, 0.82, 0.165, 1);
        }
        .menu ul li a:visited {
           color: white;
           background-color: blue;
        }
       

        .menu ul li a:link {
           color: white;
        }

        .menu :active ul li a {
           color: red;
        }

    </Style>
    <Script>

    </Script>
    <div class="wrapper" id="Menu">
        <nav class="menu" id="sub_menu">
            <ul class="clearfix" id="ul_menu">
                <li style="margin-left: 180px;" class="current-item"><a href="GeneralView" class="menu1 active" id="TC">Trang chủ</a>

                </li>
                <li>
                    <a href="showTB_loai" class="menu1" id="TB">Thông báo </a>


                    <ul class="sub-menu">
                        <li><a href="showTB_loai?TB=DH">ĐẠI HỌC </a></li>
                        <li><a href="showTB_loai?TB=SDH">SAU ĐẠI HỌC</a></li>
                        <li><a href="showTB_loai?TB=VLVH">VỪA HỌC VỪA LÀM</a></li>

                    </ul>
                </li>
                <li><a href="QuiDinh" class="menu1" id="QD">Quy định</a>
                    <ul class="sub-menu">
                        <li><a href="QuiDinh?QD=DH">ĐẠI HỌC </a></li>
                        <li><a href="QuiDinh?QD=SDH">SAU ĐẠI HỌC</a></li>
                        <li><a href="QuiDinh?QD=VLVH">VỪA HỌC VỪA LÀM</a></li>
                        
                    </ul>

                </li>
               



                <li><a class="menu1" id="DV" href="DichVuView" >Dịch vụ </a>

                </li>
                

                <li ><a href="tracuu" class="menu1" id="TC2">Tra cứu</a>

                </li>
                <li><a href="lienHe" class="menu1" id="LH">Liên hệ</a>

                </li>


            </ul>
        </nav>
        <script type="text/javascript">
            function active_menu() {
                var t = document.getElementsByClassName('menu1');
		
        
		for (var i = 0; i < t.length; i++) {
				for (var i = 0; i < t.length; i++) {
					t[i].classList.remove("active");

				}
		}
        
            }
        active_menu();
        var DV = document.getElementById('TC');
        DV.className += " active";
        
		
    
		
	
	</script>



	
    </div>
    <?php } ?>
    <?php require "./mvc/views/pages/".$view.".php" ?>

    <!----------------------------------- footer ------------------------->

    <footer class="footer">
        <p class="a">Bản quyền thuộc về Trường Đại học Tổng Hợp </p>
        <p class="">Địa chỉ: Số 9, đường 99, Hà Nội </p>
    </footer>

</body>

</html>