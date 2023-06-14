<?php


$testC = "Danh sách môn mở";
$check1 = "Đăng kí";
$url = "SV_register";
if (isset($data['show'])) {
	$testC = $data['show'];
}

$testD = "1";

if (isset($data['show1'])) {
	$testD = $data['show1'];
}
$stt = 1;
$stt2 = 1;

if(isset($data['dataClass'])){ 
$_SESSION['dataClass'] = $data['dataClass'];
   }

$tongTC = 0;
$monHoc = [];
$color = "#ffc107";
?>
<!DOCTYPE html>
<html>

<head>
	<title>CTT Đại học tổng hợp</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!-- <script src='../public/js/AV_userManagement.js'>    </script> -->
	<!-- <link rel="stylesheet" href="../public/css/AV_userManagement.css"> -->

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<link rel="stylesheet" href="../public/font/fontawesome/css/all.min.css">
</head>
<style>
	.Parent .container {
		display: none;
	}

	.Parent .btn_next_page .page {

		border: 0px;
		Margin: 1px 3px;

		color: black;
		padding: 5px 5px;
	}

	.btn_next_page .page.active {
		border: 0px;
		border-bottom: 3px solid red;
	}


	.Parent .btn_next_page {
		padding-left: 50px;
		background-color: #cccccc;
		display: flex;

	}

	.Parent .btn_next_page .Back {
		width: 30px;
		Height: 30px;
		margin-top: 5px;
	}
</style>

<body>
<script>
        active_menu();
        var DV = document.getElementById('DV');
        DV.className += " active";
    </script>
	
	<Div class="Parent">

		<div class="btn_next_page">
			<div class="Back"><a href="DichVuView"><i class="fa-solid fa-arrow-left"
						style="font-size: 25px;border-radio:1px solid blue;"></i> </a>
			</div>
			<buttton id=b3 value="1" class="page " onclick="">Trang đăng kí</buttton>
			<buttton id=b3 value="2" class="page " onclick="">Danh sách môn mở</buttton>
		</div>		

		<!-- Trang đăng kí -->
		<div id="Trang đăng kí" class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Trang đăng kí</h2>

				</div>
				<style>
					 .notice{
						color:red; font-size: 20px; }
				</style>
				<div class="panel-body">
				<?php if(isset($data['status'])){
	                $text = "";
					if($data['status'][0] == "full"){
		                $text =  "Lớp đã đầy";
					}
					else{ 
					foreach($data['status'] as $t){
		                $text = $text.$t.", ";
					}
		                ;
					$text = "Trùng lịch học với lớp: ".$text;
					}
	                
					print_r('<b><span class="notice"> '.$text.'</span></b>') ;
				}
				
				?> 
					<table class="table table-bordered">
						<thead>
							<tr>
							<th>STT</th>
								<th>Mã Lớp</th>
								<th>Tên môn học</th>
								<th>Giáo Viên</th>								
								<th>Lịch học</th>								
								<th>Ngôn ngữ giảng dạy</th>
								<th>Số TC</th>
								<th>Trạng thái</th>
								<th width="100px" height="50px"></th>
								
							</tr>
						</thead>
						<tbody>

							<?php

                        // $maSV, N'$fullname', '$date1', $namNH, $gioiTinh, $sdt, N'$diaChi',$maCTDT ";
                        // $LHP = new ClassModel();
                        // $LHP1 = $LHP->ShowClass();
						$num_rows;
                        if (isset($data['SL_SV'])) {
	                            $num_rows = sqlsrv_num_rows($data['SL_SV']);
	                            
                        }


                        if (isset($data['dataRegister'])) {
	                        while ($std = sqlsrv_fetch_array($data['dataRegister'], SQLSRV_FETCH_ASSOC)) {
								$tongTC += $std['soTinChi'];
		                        $monHoc[] = $std['maLopHocPhan'];
		                         
								if($std['startDate'] != null ){
									$cdate = date_format($std['startDate'], "d/m/Y");
									$edate = date_format($std['endDate'], "d/m/Y");
			                            	
								}
								else{
			                            $cdate = ""; $edate = "";

								}
								if (($std['startTime']) != null) {
									$stime = date_format($std['startTime']," H:i");
									$etime = date_format($std['endTime']," H:i");				                           
								}		
								else{
									$stime = "";$etime = "";
								}	  
                               
		                        echo '<tr>
			<td>' . $stt++ . '</td>					
			<td>' . $std['maLopHocPhan'] . '</td>
			<td>' . $std['tenMonHoc'] . '</td>
			<td>' . $std['hoTen'] . '
				<table table table-bordered>
				<tr>
				<td>' . $std['Sdt'] . ' </td>
				</tr>
				</table>
			
			</td>
			
			<td style="font-size:15px;">' . $std['day'] .  '</br>'.$stime . '-'.$etime . '</br>'.$cdate . '-'.$edate . '</td>
	
			
			
			<td>' . $std['ngonNguGiangDay'] . '</td>
			<td>' . $std['soTinChi'] . '</td>
			<td>' . "Thành công" . '</td>
			
			<td height= 50px;><button class="btn btn-warning"><a style="text-decoration: none; color: white; height= 50px;" href= "   
             delete_dk_LHP?maLHP='.$std['maLopHocPhan'].' ">Xoá  </a> </button></td>

		</tr>';}
		
	                        }
                        
                        ?>
		<?php 	
			if($tongTC != 0){


	        echo '<tr>
			<td> </td>
			<td></td>
			<td></td>

			<td></td>
			<td></td>
			<td>Tổng số tín chỉ:</td>
			<td> '.$tongTC.' </td>

			<td></td>

		</tr>';
			}	

		?> 
		
						</tbody>
					</table>
				</div>
				<div class="panel-body">

				</div>
			</div>
		</div>
		<Script>
			
		
	</Script>
		

        <div id="Danh sách môn mở" class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center"> Danh sách môn ĐK </h2>
				</div>
                <form action="" method="post">
						<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;"
							placeholder="Tìm kiếm theo mã lớp">
						
					</form>
				<div class="panel-body">
					<table class="table table-bordered">
						<thead style="font-size: 14px;">
							<tr >                            
								<th>STT</th>
								<th>Mã Lớp</th>
								<th>Tên môn học</th>
								<th>Giáo Viên</th>
								
								<th>Lịch học</th>
								<th>Mô tả</th>
								<th>Ngôn ngữ giảng dạy</th>
								<th>maxSV</th>
								<th width="100px" height="50px"></th>
								
							</tr>
						</thead>
						<tbody>

							<?php
                        // $maSV, N'$fullname', '$date1', $namNH, $gioiTinh, $sdt, N'$diaChi',$maCTDT ";
                        // $LHP = new ClassModel();
                        // $LHP1 = $LHP->ShowClass();
						$num_rows;


                        if (isset($_SESSION['dataClass'])) {
                               
                                if($_SESSION['theLoai'] == 3){ 
                                  
	                        while ($std = sqlsrv_fetch_array($data['dataClass'], SQLSRV_FETCH_ASSOC)) { 
								
								if (in_array($std['maLopHocPhan'], $monHoc)) {
									$check1 = "Đã đăng kí";
				                    $url = "UV_register";
				                    $color = "#4e6161";							
								}
								else{
									$check1 = "Đăng kí";
				                    $url = "SV_register";
									$color = "#ffc107";	
								}
								if($std['startDate'] != null ){
									$cdate = date_format($std['startDate'], "d/m/Y");
									$edate = date_format($std['endDate'], "d/m/Y");
			                            	
								}
								else{
			                            $cdate = ""; $edate = "";

								}
								if (($std['startTime']) != null) {
									$stime = date_format($std['startTime']," H:i");
									$etime = date_format($std['endTime']," H:i");				                           
								}		
								else{
									$stime = "";$etime = "";
								}	  
		                        echo '<tr>
			<td>' . $stt2++ . '</td>
			<td>' . $std['maLopHocPhan'] . '</td>
			<td>' . $std['tenMonHoc'] . '</td>
			<td>' . $std['hoTen'] . '
				<table table table-bordered>
				<tr>
				<td>' . $std['Sdt'] . ' </td>
				</tr>
				</table>			
			</td>
			
			<td style="font-size:15px;">' . $std['day'] .  '</br>'.$stime . '-'.$etime . '</br>'.$cdate . '-'.$edate . '</td>
			<td>' . $std['moTa'] . '</td>
			<td>' . $std['ngonNguGiangDay'] . '</td>
			<td>' . $std['soLuong'] . '/' . $std['maxSinhVien'] . '</td>
			
			
			
			<td height= 50px;><button class="btn btn-warning " style="background:'.$color.';border-color: '.$color.'"><a style="text-decoration: none; color: white; height= 50px;" 
			href= "'.$url.'?maLHP='.$std['maLopHocPhan'].'&maSV='.$_SESSION['id_user'].' ">
			'.$check1.' </a> </button></td>
			
		</tr>';


    }
	                        }
                        }
                        ?>

						</tbody>
					</table>
				</div>
				<div class="panel-body">

				</div>
			</div>
		</div>
	



	</Div>

	<script type="text/javascript">
		var buttons = document.getElementsByClassName('page');
		var contents = document.getElementsByClassName('container');
		function showContent(id) {
			for (var i = 0; i < contents.length; i++) {
				contents[i].style.display = 'none';
			}
			var content = document.getElementById(id);
			content.style.display = 'block';
		}
		for (var i = 0; i < buttons.length; i++) {

			buttons[i].addEventListener("click", function () {
				// var id = this.value;

				for (var i = 0; i < buttons.length; i++) {
					buttons[i].classList.remove("active");

				}
				this.className += " active";

				showContent(this.textContent);
			});
		}
		showContent('<?php echo $testC ?>');
		<?php if ($testD == 0 ){?>
			for (var i = 0; i < buttons.length; i++) {
					buttons[i].classList.remove("active");

				}
			buttons[0].className += " active";
		<?php }?>
        <?php if ($testD == 1 ){?>
			for (var i = 0; i < buttons.length; i++) {
					buttons[i].classList.remove("active");

				}
			buttons[1].className += " active";
		<?php }?>
	</script>
	

    
</body>

</html>