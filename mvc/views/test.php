<?php


$testC = "Tạo Lớp";

if (isset($data['show'])) {
	$testC = $data['show'];
}

$testD = "0";

if (isset($data['show1'])) {
	$testD = $data['show1'];
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
							<label for="monHoc">Môn học</label>
							<select style="width:300px" ; name="monHoc" id="monHoc">
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

				<div class="khoa">
					<!-- <form action="ShowGV_khoa" method="post">
					<select name="khoa" id="khoa">
						<option value="CNTT-TT"  >CNTT-TT <?php $t = 'CNTT-TT' ?></option>
						<option value="Toán" >Toán <?php $t = 'Toán' ?></option>
						<option value="Kinh tế quản lí">Kinh tế quản lí</option>
						<option value="Lí luận chính trị">Lí luận chính trị</option>
						<option value="Vật lí kĩ thuật">Vật lí kĩ thuật</option>
					</select>
					<Button style="border-color: white;">
						<a href="ShowGV_khoa"><i class="fa-sharp fa-solid fa-arrow-right"></i>
						</a>
					</Button> 
					
					

				</form> -->

				</div>
				<?php $t = 'aaaaa'; ?>
				<script type="text/javascript">

					e = document.getElementById('khoa');
					giaTri = e.options[e.selectedIndex].text;
					console.log(giaTri);
					T = "CNTT-TT";
					if (giaTri == T) {
					}


				</script>
				<?php echo $t; ?>
				<div class="form-group">
					<label for="giaoVien">Giáo viên</label>

					<select style="width:300px" ; name="giaoVien" id="giaoVien">
						<optgroup>
							<?php

                                if (isset($data['dataGV'])) {
	                                while ($std1 = sqlsrv_fetch_array($data['dataGV'], SQLSRV_FETCH_ASSOC)) {

		                                echo '  
									 <option  name="giaoVien" value="' . $std1['maNhanVien'] . '">' . $std1['hoTen'] . '</option>
									 ';

	                                }
                                } ?>
						</optgroup>
					</select>
				</div>
				<Div class="form-group">
					<?php
                // $SV = $this->model('MonHocModel');
                // 	$t = $SV->showMonHoc();
                // 	while ($std1 = sqlsrv_fetch_array($t, SQLSRV_FETCH_ASSOC)) {
                
                //     echo ($std1['maMonHoc']);
                
                // 	} 
                ?>
				</Div>
				<div class="form-group">
					<label for="language">Ngôn ngữ giảng dạy: </label>
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
						<button type="submit"> A</button>
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
								<th>Mã Lớp</th>
								<th>Tên môn học</th>
								<th>Giáo Viên</th>
								<th>Năm học</th>
								<th>Lịch học</th>
								<th>Mô tả</th>
								<th>Ngôn ngữ giảng dạy</th>
								<th>maxSV</th>

								<th width="60px"></th>
								<th width="60px"></th>
							</tr>
						</thead>
						<tbody>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
				

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