<?php


$testC = "Quản lí lớp";
$tt = 0;
if (isset($data['show'])) {
	$testC = $data['show'];
}

$testD = "0";

if (isset($data['show1'])) {
	$testD = $data['show1'];
}
$text_class_id = $_SESSION['id'];

$cofirm = "Xác nhận thay đổi?";

$stt = 1;
$test = 0;
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
			<div class="Back"><a href="AV_pointManagement"><i class="fa-solid fa-arrow-left"
						style="font-size: 25px;border-radio:1px solid blue;"></i> </a>
			</div>

			<buttton id=b3 value="3" class="page " onclick=""> </buttton>


		</div>






		<!-- show Class Detail -->
		<div id="Quản lí lớp" class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Danh sách sinh viên lớp: <?php echo $text_class_id; ?></h2>
					<!-- <form action="" method="post">
						<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;"
							placeholder="Tìm kiếm theo mã lớp">
						
					</form> -->
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



					<style>
						.form-control {
							width: 70px;
							border-color: white;
						}
					</style>

				</div>

				<div class="panel-body">

					<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>STT</th>

								<th>Mã Sinh Viên </th>
								<th>Họ tên Sinh Viên </th>
								<th>Điểm quá trình</th>
								<th>Điểm cuối kì</th>
								<th>Vắng</th>
								<th></th>

							</tr>
						</thead>

						<tbody>


							<?php

							// $maSV, N'$fullname', '$date1', $namNH, $gioiTinh, $sdt, N'$diaChi',$maCTDT ";
							// $LHP = new ClassModel();
							// $LHP1 = $LHP->ShowClass();
							
							if (isset($data['ClassDetail'])) {
								while ($std = sqlsrv_fetch_array($data['ClassDetail'], SQLSRV_FETCH_ASSOC)) {

									echo '<form action="Update_point_SV?maSV='.$std['maSinhVien'].'&maLHP='.$_SESSION['id'] . '"  method="post" > 
							<tr >
								<td class="row-value">' . $stt++ . '</td>
								<td id="maSV" class="row-value">' . $std['maSinhVien'] . '</td>
								<td class="row-value"> ' . $std['hoTen'] . '</td>
								<td class="row-value"> <input  type="number" class="form-control"   min="0" max="10"id= "QT"name="QT" value="' . $std['QT'] . '">
								</td>	
													
								<td>
									<div class="form-group">
										<input style="width=50px;"  type="number" min="0" max="10"class="form-control"
										 id="CK" name="CK" value="' . $std['CK'] . '">
									</div>
								</td>
								<td>
								<div class="form-group">
								<input required="false" type="number" class="form-control" id="vang" name="vang"  min="0" max="10" value="' . $std['vang'] . '">
								</div>
								</td>
								<td height=50px;>
									
								
								<button  class="btn btn-success" ">Cập nhập</button>
									
											</td>
											

							</tr>
							</form>';

								}
							}
							?>

							<!-- <Script>
								$('#btn-table-rows').click(function (event) {
									var values = [];


									var rowValue = $(this).closest('tr').find('td.row-value').text();
									values.push(rowValue)


									var json = JSON.stringify(values);

									alert(json);

								});
							</script> -->
							<script>

								function showMessage() {
									e = document.getElementById("QT").value;
									CK = document.getElementById('CK').value;
									vang = document.getElementById('vang').value;
									t = document.getElementById('maSV').textContent;
									console.log(e);
									window.location.href = "Update_point_SV?maLHP=" +<?php echo $text_class_id; ?> +"&QT=" + e + "&maSV=" + t + "&CK=" + CK + "&vang=" + vang;
									alert('Xác nhận thay đổi!');


								}
							</script>
							<?php if (isset($_GET['giaTri'])) {
								$tt = $_GET['giaTri'];
								echo $tt;
								echo "lấy đc giá trị";
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