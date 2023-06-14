<?php
// function set_url( $url )
// {
//     echo("<script>history.replaceState({},'','$url');</script>");
// }
// if(isset($data['setURL'])){
// 	set_url($data['setURL']);

// }

$testC = "Tạo Lớp";

if (isset($data['show'])) {
	$testC = $data['show'];
}

$testD = "0";

if (isset($data['show1'])) {
	$testD = $data['show1'];
}

global $tt;
 $tt= "abc";
$text = "1";
global $listGV;
$listGV = [];


$i = 0;
if(isset($_SESSION['dataSUB'])){
	
}

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
			<button id=b1 value="1" class="page active" onclick="">Tạo Lớp</button>
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
		<div id="Tạo Lớp" class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
				<h2 class="text-center">Tạo Lớp</h2>
				</div>
				<div class="panel-body">
					<form name="insertLop" action="insertLop" method="post">
						<div class="form-group">
							<label for="monHoc">Môn học</label></br>
							
							<select style="width:300px" ; name="monHoc" id="monHoc" onchange="genderChanged(this)">
								<optgroup>
									<?php if (isset($data['dataSubject'])) {
	                                while ($std1 = sqlsrv_fetch_array($data['dataSubject'], SQLSRV_FETCH_ASSOC)) {
		                                echo '  
									 <option  name="monHoc" value="' . $std1['maMonHoc'] . '">' . $std1['tenMonHoc'] . '</option>
									 ';
		                                    
	                                }
                                } ?>
								</optgroup>
							</select>
							
						</div>
						
						
						<script>

							$(document).ready(function () {

								$("#monHoc").select2({

									placeholder: "Select a State",

									allowClear: true							
								});
								

							});

						</script>
				</div>
				<div class="form-group">
					<label for="namHoc">Năm học</label>
					<input required="true" type="number" class="form-control" id="namHoc" name="namHoc"
						placeholder="  ">
				</div>

				<div class="form-group">
					<label for="hocKi">Học kì: </label>
					<select name="hocKi">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
				</div>

				
				
					<script type="text/javascript">		
					function genderChanged(obj){			
					e = document.getElementById('monHoc');
					giaTri = e.options[e.selectedIndex].value;
					text = e.options[e.selectedIndex].text;
					
					index = e.selectedIndex;
					e.options[1].selected= true;
					console.log(e.selectedIndex);
					console.log(giaTri);
						 window.location.href = "AV_classManagement?giaTri="+giaTri+"&index="+index;				
					}
					</script>
				
				<script>
					e = document.getElementById('monHoc');
					<?php if (isset($_GET['index'])) {
	                    $text = $_GET['index'];
	                    
                    }?>
					e.options[<?php echo $text?>].selected = true;
				</script>
				<div class="form-group" >
				<!-- <?php
// Xem ngày hiện tại thuộc tuần thứ mấy trong năm ?
// $date = date('Y-m-d');
// while (date('w', strtotime($date)) != 1) {
// $tmp = strtotime('-1 day', strtotime($date));
// $date = date('Y-m-d', $tmp);
// }
// $week = date('W', strtotime($date));
// echo "Tuần thứ: " . $week ;
?> -->
					<label for="LH"><b>Lịch học</b></label> </br>
					<label for="Day">Thứ </label></br>
					<select name="day">
						<option value="Monday">Thứ 2</option>
						<option value="Tuesday">Thứ 3</option>
						<option value="Wednesday">Thứ 4</option>
						<option value="Thursday">Thứ 5</option>
						<option value="Friday">Thứ 6</option>
						<option value="Saturday">Thứ 7</option>
						<option value="Sunday">Chủ nhật</option>

					</select> </br>
					<label for="startTime">Thời gian bắt đầu</label>
					<input style="width: 40%;"required="true" type="time" class="form-control" name="startTime"
						placeholder="Start time ">
						<label for="giaoVien">Thời gian kết thúc</label>
						<input  style="width: 40%;"required="true" type="time" class="form-control" name="endTime"
						placeholder="End time  ">
						<label for="giaoVien">Ngày bắt đầu</label>
						<input  style="width: 40%;"required="true" type="date" class="form-control"  name="startDate"
						placeholder="Start date  ">
						<label for="giaoVien">Ngày kết thúc</label>
						<input  style="width: 40%;"required="true" type="date" class="form-control" name="endDate"
						placeholder="End date  ">
						
				</div>
				
				<div class="form-group">
					<label for="giaoVien">Giáo viên</label></br>
						
					<select style="width:300px" ; name="giaoVien" id="giaoVien">
						<optgroup>
						<?php if (isset($data['dataGV'])) {
									if(isset($_GET['giaTri'])){
		                        		$tt = substr($_GET['giaTri'], 0, 2);
		                   
										while ($std1 = sqlsrv_fetch_array($data['dataGV'], SQLSRV_FETCH_ASSOC)) {
											if(($tt == $std1['maKhoa'])){ 
												echo '  
										 		<option  name="giaoVien" value="' . $std1['maNhanVien'] . '">' . $std1['hoTen'] . '</option>
										 		';
											}
										}
									}
	                                
                                } ?>
						</optgroup>
					</select>
				</div>
				<Script>

				</Script>
				
				<div class="form-group">
					<label for="language">Ngôn ngữ giảng dạy: </label></br>
					<select name="language">
						<option value="VN"> Tiếng Việt </option>
						<option value="EN"> Tiếng Anh </option>
						<option value="PARIS"> Tiếng Pháp </option>
						<option value="JAPAN"> Tiếng Nhật </option>
						<option value="ELSE"> Khác </option>
					</select>
				</div>

				<div class="form-group">
					<label for="moTa">Mô tả:</label>
					<input required="true" type="text" class="form-control" id="moTa" name="moTa" placeholder=" ">
				</div>
				<div class="form-group">
					<label for="maxSV">Số lượng tối đa sinh viên:</label>
					<input required="true" type="number" class="form-control" id="maxSV" name="maxSV" value="maxSV1"
						placeholder="">

				</div>

				<button class="btn btn-success" onclick="Tbao()">Lưu </button>
				</form>
			</div>
		</div>


		<!-- show student -->
		<div id="Quản lí lớp" class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Quản lí lớp</h2>
					<form action="ShowLop" method="post">
						<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;"
							placeholder="Tìm kiếm theo mã lớp">
						
					</form>
		


				</div>
				<div class="panel-body">
					<table class="table table-bordered" style="font-size: 14px;">
						<thead style="font-size: 14px;">
							<tr >
								<th>Mã Lớp</th>
								<th>Tên môn học</th>
								<th>Giáo Viên</th>
								<th>Năm học</th>
								<th>Lịch học</th>
								<th>Mô tả</th>
								<th>Ngôn ngữ </th>
								<th>SL_SV</th>
								<th width="60px"></th>
								<th width="60px"></th>
							</tr>
						</thead>
						<tbody>

							<?php

                        // $maSV, N'$fullname', '$date1', $namNH, $gioiTinh, $sdt, N'$diaChi',$maCTDT ";
                        // $LHP = new ClassModel();
                        // $LHP1 = $LHP->ShowClass();
						


                        if (isset($data['dataClass'])) {
	                        while ($std = sqlsrv_fetch_array($data['dataClass'], SQLSRV_FETCH_ASSOC)) {
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
			<td>' . $std['maLopHocPhan'] . '</td>
			<td>' . $std['tenMonHoc'] . '</td>
			<td>' . $std['hoTen'] . '
				<table table table-bordered>
				<tr style="font-size: 14px; ">
				<td style="border: 1px solid white; padding-left:0px">' . $std['Sdt'] . ' </td>
				</tr>
				</table>
			
			</td>
			<td>' . $std['namHoc'] . '-' . $std['hocKy'] . '</td>
			<td>' . $std['day'] .  '</br>'.$stime . '-'.$etime . '</br>'.$cdate . '-'.$edate . '</td>
			<td>' . $std['moTa'] . '</td>
			<td>' . $std['ngonNguGiangDay'] . '</td>
			<td>' . $std['soLuong']. '/'.$std['maxSinhVien'] . '</td>
			
			
			<td><button class="btn btn-warning"><a style="text-decoration: none; color: white;" href= "UpdateLHP?maClass= ' . $std['maLopHocPhan'] . ' ">Edit </a> </button></td>
			<td><button class="btn btn-danger" ><a click=notice(); style="text-decoration: none; color: white;" href="DeleteLHP?maLHP= ' . $std['maLopHocPhan'] . '">Delete</a></button></td>
		</tr>';
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

	<Script>
		function notice() {
			alert("Bạn chắc chắn xoá lớp này?")
		}
	</Script>
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
		<?php if ($testD == 1 ){?>
			for (var i = 0; i < buttons.length; i++) {
					buttons[i].classList.remove("active");

				}
			buttons[1].className += " active";
		<?php }?>
	</script>



	<?php if (isset($data['status']) and $data['status'] != "") { ?>

	<script>

		alert('thành công');
		alert($data['status']);
	</script>

	<?php } ?>
</body>

</html>