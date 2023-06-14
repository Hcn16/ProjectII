<?php


$testC = "Quản lí lớp";

if (isset($data['show'])) {
	$testC = $data['show'];
}

$testD = "0";

if (isset($data['show1'])) {
	$testD = $data['show1'];
}
$stt = 1;
$stt1 = 1;
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

	<Div class="Parent">

		<div class="btn_next_page">
			<div class="Back"><a href="AdminView"><i class="fa-solid fa-arrow-left"
						style="font-size: 25px;border-radio:1px solid blue;"></i> </a>
			</div>
			
			<buttton id=b3 value="3" class="page " onclick="">Quản lí lớp</buttton>


		</div>


		<script>
			function Tbao() {
				var t = document.insertLop;
				if (t.giaoVien.value != "" && t.monHoc.value != "" && t.maxSV.value != null) {
					alert("Thành công");
				}


			}
		</script>
		<!-- Add student -->
		

		<!-- show student -->
		<div id="Quản lí lớp" class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Quản lí lớp</h2>
					<form action="ShowLop" method="post">
						<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;"
							placeholder="Tìm kiếm theo mã lớp">
						
					</form>
					<!-- <Form action="ShowSinhVien_K" method="post">
					<select name="K" id="K">
						<option value="2019">K64</option>
						<option value="2020">K65</option>
						<option value="2021">K66</option>
						<option value="2022">K67</option>
					</select> 
					<Button type="submit" style="border-color: white;">
						<a href=""><i class="fa-sharp fa-solid fa-arrow-right"></i>
						</a>
					</Button>
				</Form> -->



				</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
                                <th>STT</th>
								<th>Mã Lớp</th>
								<th>Tên môn học</th>
								<th>Giáo Viên</th>
								<th>Năm học</th>
								<th>Lịch dạy</th>
								<th>Mô tả</th>
								<th>Ngôn ngữ giảng dạy</th>
								<th>Số lượng SV</th>

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


                        if (isset($data['dataClass'])) {
	                        while ($std = sqlsrv_fetch_array($data['dataClass'], SQLSRV_FETCH_ASSOC)) {
								$startDate = date_format($std['startDate'], "d/m/Y");
									$endDate = date_format($std['endDate'], "d/m/Y");
									$startTime = date_format($std['startTime']," H:i");
									$endtime = date_format($std['endTime']," H:i");	
                                if(($_SESSION['id_user'] == $std['maNhanVien']) && ($_SESSION['theLoai'] == 2) ){
									

                                    echo '<tr>
                                    <td>' . $stt++ . '</td>
                                    <td>' . $std['maLopHocPhan'] . '</td>
                                    <td>' . $std['tenMonHoc'] . '</td>
                                    <td>' . $std['hoTen'] . '
                                        <table table table-bordered>
                                        <tr>
                                        <td> a</td>
                                        </tr>
                                        </table>
                                    
                                    </td>
                                    <td>' . $std['namHoc'] . '-' . $std['hocKy'] . '</td>
                                    <td>' . $std['day'] . '<br>' . $startTime . '-' . $endtime. '<br>' . $startDate . '-' . $endDate. '</td>
                                    <td>' . $std['moTa'] . '</td>
                                    <td>' . $std['ngonNguGiangDay'] . '</td>
                                    <td>' . $std['soLuong'] . '</td>
                                    
                                    
                                    <td height= 50px;><button class="btn btn-warning"><a style="text-decoration: none; color: white; height= 50px;" href= "   
                                     showClassDetail?maLHP='.$std['maLopHocPhan'].' ">Chi tiết </a> </button></td>
                        
                                </tr>';
                                }
                                if($_SESSION['id_user'] == 1){
										
		                        echo '<tr>
								<td>' . $stt1++ . '</td>
			<td>' . $std['maLopHocPhan'] . '</td>
			<td>' . $std['tenMonHoc'] . '</td>
			<td>' . $std['hoTen'] . '
				
			
			</td>
			<td>' . $std['namHoc'] . '-' . $std['hocKy'] . '</td>
			<td>' . $std['day'] . '<br>' . $startTime . '-' . $endtime. '<br>' . $startDate . '-' . $endDate. '</td>
			<td>' . $std['moTa'] . '</td>
			<td>' . $std['ngonNguGiangDay'] . '</td>
			<td>' . $std['soLuong'] . '/' . $std['maxSinhVien'] . '</td>
			
			
			<td style={width: 20px;} height= 50px;><button class="btn btn-warning"><a style="text-decoration: none; color: white; height= 50px; font-size: 15px;" href= "   
             showClassDetail?maLHP='.$std['maLopHocPhan'].' ">Chi tiết </a> </button></td>

		</tr>';}
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
		
	</script>



	<?php if (isset($data['status']) and $data['status'] != "") { ?>

	

	<?php } ?>
</body>

</html>