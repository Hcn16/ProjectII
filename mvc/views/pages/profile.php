<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
        active_menu();
        var DV = document.getElementById('DV');
        DV.className += " active";
    </script>
<div class="btn_next_page">
			<div class="Back"><a href="DichVuView"><i class="fa-solid fa-arrow-left"
						style="font-size: 25px;border-radio:1px solid blue;"></i> </a>
			</div>
			
		</div>
<div class="container">

<div class="btn_next_page1">
				
            <div class="panel panel-primary">

                <!-----------------------------------------Sinh viên   -------------------------->
               
                <Style>
                    .panel-body .table-bordered thead tr th{
                        width: 200px;
                    }
                </Style>


                <div class="Main" style="display: flex;">
                <div style=" width: 200px; height: 200px;margin-top: 40px; ">
                <img style="margin-left: 0px;  width: 200px; height: 200px;border: 2px solid burlywood;  "
                        src="../public/image/<?php echo $_SESSION['avatar'];?>" alt="">
                </div>
                <div class="panel-body" style="margin-top: 40px;margin-left: 20px;
                margin-bottom: 40px; border: 2px solid burlywood; width: 1000px; border-radius: 5px;">
                             <p class="panel-heading" style="margin-left: 20px;font-size: 20px;"><b>
                    Thông tin cá nhân</b>

                </p>
                        <div style="margin-left: 20px;">
                            <?php
                            if (isset($data['dataStudent'])) {
                                while ($std = sqlsrv_fetch_array($data['dataStudent'], SQLSRV_FETCH_ASSOC)) {

                                    echo '<tr>
                                    
                                    <p>MSSV: '. $std['maSinhVien'] .'</p>
                                    <p>Họ và tên:  '. $std['hoTen'] .'</p>
                                   <p>Ngày sinh:  '. date_format($std['ngaySinh'], "d/m/Y") .'</p>
                                    <p>Giới tính: '. $std['gioiTinh'] .'</p>
                                    <p>Địa chỉ: '. $std['diaChi'] .'</p>
                                   
                                    <p>Số điện thoại: '. $std['Sdt'] .'</p>
                                   
                                        </tr>';
                                    
                                }
                            }
                          

                            ?>
                             </div>
                             <p class="panel-heading" style="margin-left: 20px;font-size: 20px;"><b>
                    Kết quả học tập:</b>

                </p>
                        <div style="margin-left: 20px;">
                            <?php
                                    $TCCQ = "";$CPA="";$TCQ="";
                                    if(isset($_SESSION['TCCQ']) && isset($_SESSION['CPA']) && isset($_SESSION['TCD'])){
                                        $TCCQ = $_SESSION['TCCQ'];
                                        $CPA = $_SESSION['CPA'];
                                        $TCQ = $_SESSION['TCD'];
                                    }
                                    echo '<tr>
                                    
                                    <p>Trạng thái học tập: Đang học</p>
                                    <p>Nợ tín chỉ: '.$TCCQ.' </p>
                                    <p>CPA:  '.$CPA.'</p>
                                    <p>Số TC tích luỹ:'.$TCQ.' </p>
                                   
                                   
                                        </tr>';
                                    
                                
                            
                          

                            ?>
                             </div>
                       
                </div>
                </div>
                

        </div>
</div>
</div>
</body>
</html>