<?php


$testC = "Thêm giáo viên";
	$testD = "0";
if (isset($data['show'])) {
	$testC = $data['show'];
}
if (isset($data['show1'])) {
	
	$testD = $data['show1'];
}

// $file = new DirectoryIterator('../anh.png');
if(isset($_GET['show1']) && $_GET['show']){
	
	$testD = $_GET['show1'];
	$testC = $_GET['show'];
	
}



?>
<!DOCTYPE html>
<html>

<head>
	<title>Registation Form * Form Tutorial</title>
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
			<button id=b1 value="0" class="page active" onclick="InsertGV()">Thêm giáo viên</button>
			<buttton id=b2 value="1" class="page " onclick="InsertSV()">Thêm sinh viên</buttton>
			<buttton id=b3 value="2" class="page " onclick="ShowSinhVien()">Xem sinh viên</buttton>
			<buttton id=b4 value="3" class="page " onclick="ShowGV()">Xem giáo viên</buttton>

		</div>
		<Script>
			function ShowSinhVien() {
				var text = 'Xem sinh viên';
				location.href = "AV_userManagement?show1=2&show="+text;
		}

		function ShowGV() {
			
			var text = 'Xem giáo viên';
				location.href = "AV_userManagement?show1=3&show="+text;
		}
		function InsertSV() {
		
				var text = 'Thêm sinh viên';
				location.href = "AV_userManagement?show1=1&show="+text;
			
		}

		function InsertGV() {
			var text = 'Thêm giáo viên';
			location.href = "AV_userManagement?show1=0&&show="+text;
		}
		</Script>
		<div id="Thêm giáo viên" class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Thêm Giáo Viên</h2>
				</div>
				<div class="panel-body">
					<form action="insertGV" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="usr">Họ Tên:</label>

							<input required="true" type="text" class="form-control" id="usr" name="fullname"
								placeholder="  ">
						</div>
						
						<div class="form-group">
							<label for="khoa">Khoa:</label>
							<select name="khoa">
								<option value="IT">CNTT-TT</option>
								<option value="PH">Vật lý kĩ thuật</option>
								<option value="EN">Ngoại ngữ</option>
								<option value="MI">Toán</option>
								<option value="ME">Kinh tế quản lí</option>
								<option value="MIL">Lí luận chính trị</option>
							</select>
						</div>
					
						<div class="form-group">
							<label for="ngaySinh">Ngày sinh:</label>
							<input required="true" type="date" class="form-control" id="ngaySinh" name="ngaySinh"
								placeholder="">
						</div>

						<div class="form-group">
							<label for="gioiTinh">Giới tính:</label>
							<select name="gioiTinh" id="gioiTinh">
                        <Option value="Nam">Nam</Option>
                        <Option value="Nữ">Nữ</Option>
                    </select>
						</div>
						<div class="form-group">
							<label for="sdt">Số điện thoại:</label>
							<input required="true" type="number" class="form-control" id="sdt" name="sdt"
								placeholder=" ">
						</div>

						<div class="form-group">
				<label for="sdt">Địa chỉ:</label><br>
						<select name="province" class="province" id="province">
        <option value="">--Chọn tỉnh--</option>
        <?php
                            if (isset($data['province'])) {
                                while ($std = sqlsrv_fetch_array($data['province'], SQLSRV_FETCH_ASSOC)) {
                                    echo ' <option value="'.$std['code'].'">'.$std['full_name'].'</option>';
                                    
                                }
                            }
                          

                            ?>
    </select>

    <select name="district" class="district" id="districts">
        <option value="">--Chưa chọn Quận huyện--</option>
   
    </select>
    <select name="ward" class="ward" id="ward">
        <option value="">--Chưa chọn Xã--</option>
   
    </select>
						</div>
						
						<div class="form-group">
					<label for="diaChi">Ảnh đại diện:</label>
					<input required="true" type="file" class="form-control" id="avatar" name="avatar" placeholder="">
				</div>

						<button class="btn btn-success">Lưu </button>

					</form>
				</div>
			</div>
		</div>


		<script>
			function Tbao() {
				alert("Thành công");
				alert($data['status']);
			}
		</script>
		<!-- Add student -->
		<div id="Thêm sinh viên" class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Thêm Sinh Viên</h2>
				</div>
				<div class="panel-body">
					<form action="insertSV" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="maCTDT">CTDT:</label>
							<select name="CTDT">
								<option value="1">Công nghệ thông tin</option>
								<option value="2">Cơ khí</option>
								<option value="3">Công nghệ may</option>
								<option value="4">Công nghệ thực phẩm</option>
								<option value="6">Ngoại ngữ</option>
								<option value="7">Vật lý hạt nhân</option>
							</select>
						</div>
				</div>
				<div class="form-group">
					<label for="usr">Họ Tên:</label>
					<input required="true" type="text" class="form-control" id="usr" name="fullname" placeholder="  ">
				</div>
				<div class="form-group">
					<label for="ngaySinh">Ngày sinh:</label>
					<input required="true" type="date" class="form-control" id="ngaySinh" name="ngaySinh"
						placeholder="">
				</div>
				<div class="form-group">
					<label for="namNH">Năm nhập học:</label>
					<input required="true" type="number" class="form-control" id="namNH" name="namNH" placeholder="">
				</div>
				<div class="form-group">
					<label for="gioiTinh">Giới tính:</label>
					<select name="gioiTinh" id="gioiTinh">
                        <Option value="Nam">Nam</Option>
                        <Option value="Nữ">Nữ</Option>
                    </select>
				</div>
				<div class="form-group">
					<label for="sdt">Số điện thoại:</label>
					<input required="true" type="number" class="form-control" id="sdt" name="sdt" placeholder=" ">
				</div>
				<div class="form-group">
				<label for="sdt">Địa chỉ:</label><br>

				<select name="province2" class="province2" id="province2">
        <option value="">--Chọn tỉnh--</option>
        <?php
                            if (isset($data['province2'])) {
                                while ($std = sqlsrv_fetch_array($data['province2'], SQLSRV_FETCH_ASSOC)) {
                                    echo ' <option value="'.$std['code'].'">'.$std['full_name'].'</option>';
                                    
                                }
                            }
                          

                            ?>
    </select>

    <select name="district2" class="district2" id="districts2">
        <option value="">--Chưa chọn Quận huyện--</option>
   
    </select>
    <select name="ward2" class="ward2" id="ward2">
        <option value="">--Chưa chọn Xã--</option>
   
    </select>
	</div>
				<div class="form-group">
					<label for="diaChi">Ảnh đại diện:</label>
					<input required="true" type="file" class="form-control" id="avatar" name="avatar2" placeholder="">
				</div>

				<button class="btn btn-success" onclick="Tbao()">Lưu </button>
				</form>
			</div>
		</div>
	</div>

	<!-- show student -->
	<div id="Xem sinh viên" class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Xem thông tin Sinh Viên</h2>
				<form action="ShowSinhVien" method="post">
					<input type="number" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;"
						placeholder="Tìm kiếm theo MSSV">
					
				</form>
				<Form action="ShowSinhVien_K" method="post" style="margin: 5px 5px;">
					<select name="K" id="K">
						<option value="2019">K64</option>
						<option value="2020">K65</option>
						<option value="2021">K66</option>
						<option value="2022">K67</option>
					</select>
					<Button type="submit" style="border-color: white; margin-left: 10px; width: 30px; height: 30px; Border-radius: 5px;">
						<a href=""><i class="fa-sharp fa-solid fa-search"></i>
						</a>
					</Button>
				</Form>



			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>MSSV</th>
							<th>Họ & Tên</th>
							<th>Ngày sinh</th>
							<th>năm Nhập Học</th>
							<th>Giới tính</th>
							<th>SDT</th>
							<th>Địa chỉ</th>
							<th>mã CTDT</th>
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>

						<?php

                        // $maSV, N'$fullname', '$date1', $namNH, $gioiTinh, $sdt, N'$diaChi',$maCTDT ";
                        if (isset($data['dataSinhVien'])) {
	                        while ($std = sqlsrv_fetch_array($data['dataSinhVien'], SQLSRV_FETCH_ASSOC)) {

		                        echo '<tr>
			<td>' . $std['maSinhVien'] . '</td>
			<td>' . $std['hoTen'] . '</td>
			<td>' . date_format($std['ngaySinh'], "d/m/Y") . '</td>
			<td>' . $std['namNhapHoc'] . '</td>
			<td>' . $std['gioiTinh'] . '</td>
			<td>' . $std['Sdt'] . '</td>
			<td>' . $std['diaChi'] . '</td>
			<td>' . $std['maCTDT'] . '</td>
			<td><button class="btn btn-warning"><a style="text-decoration: none; color: white;" href= "UpdateSV?MSSV= ' . $std['maSinhVien'] . ' ">Edit </a> </button></td>
			<td id= "deleteSV"><button class="btn btn-danger"id= "deleteSV" onclick="DeleteSV('.$std['maSinhVien'].')" >
			<a style="text-decoration: none; color: white;" 
			id= "deleteSV" ; 
			>Delete</a></button></td>

		</tr>';
	                        }
                        }
                        ?>
						<!-- //<td>' . $std['ngaySinh'] . '</td> -->
					</tbody>
				</table>
			</div>
			<div class="panel-body">
<script>
	
	// function comfirmXoa(){
	// 	let text = ("Bạn có chắc chắn xoá sinh viên này?");
	// 	if (confirm(text) == true) {
	// 		window.location.href = "AV_classManagement?giaTri=";	
	// 		// window.location.href = "AV_userManagement?MSSV=NULL";
	// 		// test =  "AV_userManagement";
	// 		// var el = document.getElementsByTagName('a');
	// 		// el[0].href =  test;  
  	// 	} else {
	// 		test = false;
		
  	// 		}
 			
	// }
	function DeleteSV(id) {
			option = confirm('Bạn có muốn xoá sinh viên này không?')
			if(!option) {
				return;
			}

			console.log(id)
           
			$.post('DeleteSV', {
				'MSSV': id
			}, function(data) {
				
				location.href = "ShowSinhVien";
			})
		}
		function DeleteGV(id) {
			option = confirm('Bạn có muốn xoá giáo viên này không?')
			if(!option) {
				return;
			}

			
           
			$.post('DeleteGV', {
				'maNhanVien': id
			}, function(data) {
				
				location.href = "ShowGV";
			})
		}

		

		function InsertSinhVien() {
			alert('vào show ');
			$.post('ShowSinhVien', {
				
			}, function(data) {
				
				location.href = "ShowSinhVien";
			})
		}

</script>
			</div>
		</div>
	</div>

	<!-- show teacher -->
	<div id="Xem giáo viên" class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Xem Thông tin Giáo Viên</h2>
				<form action="ShowGV" method="post">
					<input type="number" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;"
						placeholder="Tìm kiếm theo mã giáo viên">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Mã Giáo Viên</th>
							<th>Họ & Tên</th>
							<th>Ngày sinh</th>
							<th>Giới tính</th>
							<th>SDT</th>
							<th>Địa chỉ</th>

							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>

						<?php

                        // $maSV, N'$fullname', '$date1', $namNH, $gioiTinh, $sdt, N'$diaChi',$maCTDT ";
                        if (isset($data['dataGiaoVien'])) {
	                        while ($std = sqlsrv_fetch_array($data['dataGiaoVien'], SQLSRV_FETCH_ASSOC)) {

		                        echo '<tr>
							<td>' . $std['maNhanVien'] . '</td>
							<td>' . $std['hoTen'] . '</td>
							<td>' . date_format($std['ngaySinh'], "d/m/Y") . '</td>			
							<td>' . $std['gioiTinh'] . '</td>
							<td>' . $std['Sdt'] . '</td>
							<td>' . $std['diaChi'] . '</td>
		
							<td><button class="btn btn-warning"><a style="text-decoration: none; color: white;" href= "UpdateGV?maNhanVien= ' . $std['maNhanVien'] . ' ">Edit </a> </button></td>
							<td><button class="btn btn-danger" onclick="DeleteGV('.$std['maNhanVien'].')"><a style="text-decoration: none; color: white;" >Delete</a></button></td>

		</tr>';
	                        }
                        }
                        ?>
						<!-- //<td>' . $std['ngaySinh'] . '</td> -->
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
		<?php if ($testD == 2 ){?>
			for (var i = 0; i < buttons.length; i++) {
					buttons[i].classList.remove("active");

				}
			buttons[2].className += " active";
		<?php }?>
		<?php if ($testD == 3 ){?>
			for (var i = 0; i < buttons.length; i++) {
					buttons[i].classList.remove("active");

				}
			buttons[3].className += " active";
		<?php }?>
		<?php if ($testD == 1 ){?>
			for (var i = 0; i < buttons.length; i++) {
					buttons[i].classList.remove("active");

				}
			buttons[1].className += " active";
		<?php }?>

		<?php if ($testD == 0 ){?>
			for (var i = 0; i < buttons.length; i++) {
					buttons[i].classList.remove("active");

				}
			buttons[0].className += " active";
		<?php }?>
	</script>

	
</body>

</html>