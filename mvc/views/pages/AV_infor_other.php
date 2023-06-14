<?php


$testC = "Thêm thông báo";
$testD = "0";
if (isset($data['show'])) {
	$testC = $data['show'];
}
if (isset($data['show1'])) {
	$testD = $data['show1'];
}

if(isset($_GET['show1']) && $_GET['show']){
	
	$testD = $_GET['show1'];
	$testC = $_GET['show'];
	
}
$stt = 1;
$stt2 = 1;
$title = "";
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
<script>
	function ShowTT() {
			
			var text = 'Xem thông tin';
				location.href = "AV_infor_other?show1=3&show="+text;
		}
	
	function DeleteTB(id) {
			option = confirm('Bạn có muốn xoá thông báo này không?')
			if(!option) {
				return;
			}

			console.log(id)
           
			$.post('DeleteTT', {
				'id': id,
				'TT' : "ThongBao"
			}, function(data) {
				var text = "ThongBao"
				location.href = "ShowThongTin?TT="+text;
			})
		}	

	function DeleteLH(id) {
			option = confirm('Bạn có muốn xoá liên hệ này không?')
			if(!option) {
				return;
			}

			console.log(id)
           
			$.post('DeleteTT', {
				'id': id,
				'TT' : "LienHe"
			}, function(data) {
				var text = "LienHe"
				location.href = "ShowThongTin?TT="+text;
			})
		}	

		function DeleteQD(id) {
			option = confirm('Bạn có muốn xoá qui định này không?')
			if(!option) {
				return;
			}

			console.log(id)
           
			$.post('DeleteTT', {
				'id': id,
				'TT' : "QuiDinh"
			}, function(data) {
				var text = "QuiDinh"
				location.href = "ShowThongTin?TT="+text;
			})
		}	
</script>
<body>

	<Div class="Parent" style="margin-bottom: 100px;">

		<div class="btn_next_page">
			<div class="Back"><a href="AdminView"><i class="fa-solid fa-arrow-left"
						style="font-size: 25px;border-radio:1px solid blue;"></i> </a>
			</div>
			<button id=b1 value="0" class="page active" onclick="">Thêm thông báo</button>
			<buttton id=b2 value="1" class="page " onclick="">Thêm qui định</buttton>
			<buttton id=b2 value="2" class="page " onclick="">Thêm liên hệ</buttton>
			<buttton id=b2 value="3" class="page " onclick="ShowTT()">Xem thông tin</buttton>
		</div>

		<div id="Thêm thông báo" class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Thêm thông báo</h2>
				</div>
				<div class="panel-body">
					<form action="insertTB" method="post">
						<div class="form-group">
							<label for="usr">Nội dung thông báo:</label>

							<input required="true" type="text" class="form-control" id="usr" name="content"
								placeholder="  ">
						</div>
						
						<div class="form-group">
							<label for="khoa">Loại:</label>
							<select name="Loai">
								<option value="DH">Đại học</option>
								<option value="SDH">Sau đại học</option>
								<option value="VLVH">Vừa học vừa làm</option>
								
							</select>
						</div>

						<button class="btn btn-success" onclick="Tbao()">Lưu </button>

					</form>
				</div>
			</div>
		</div>
        
     
		<!-- Add QD -->
        <div id="Thêm qui định" class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Thêm qui định</h2>
				</div>
				<div class="panel-body">
					<form action="insertQD" method="post">
						<div class="form-group">
							<label for="usr">Nội dung qui định:</label>

							<input required="true" type="text" class="form-control" id="usr" name="content"
								placeholder="  ">
						</div>
						
						<div class="form-group">
							<label for="khoa">Loại:</label>
							<select name="Loai">
								<option value="DH">Đại học</option>
								<option value="SDH">Sau đại học</option>
								<option value="VLVH">Vừa học vừa làm</option>
								
							</select>
						</div>

						<button class="btn btn-success" onclick="Tbao()">Lưu </button>

					</form>
				</div>
			</div>
		</div>


       <!-- /////////////////////////////////////-->
		<!-- Add student -->
		<div id="Thêm liên hệ" class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Thêm thông tin liên hệ</h2>
				</div>
				<div class="panel-body">
					<form action="insertLH" method="post">
					
			
				
				<div class="form-group">
					<label for="namNH">Tên bộ phận:</label>
					<input required="true" type="TEXT" class="form-control" id="host" name="host" placeholder="">
				</div>
				
                <div class="form-group">
					<label for="diaChi">Địa chỉ:</label>
					<input required="true" type="text" class="form-control" id="diaChi" name="diaChi" placeholder="">

				</div>
				<div class="form-group">
					<label for="sdt">Số điện thoại:</label>
					<input required="true" type="text" class="form-control" id="Sdt" name="Sdt" placeholder=" ">
				</div>
				

				<div class="form-group">
					<label for="diaChi">Email:</label>
					<input required="true" type="text" class="form-control" id="Email" name="Email" placeholder="">
				</div>

				<button class="btn btn-success" onclick="Tbao()">Lưu </button>
				</form>
			</div>
		</div>
	</div>

<script>
	function Tbao() {
                <?php if (isset($data['status'])) {
                    echo'alert("Thành công")';
                }?>	
			}
</script>
<?php if (isset($data['QD'])) {$title = "Qui Định";}
		if (isset($data['TB'])) {$title = "Thông Báo";}
		if (isset($data['LH'])) {$title = "Liên Hệ";}


?> 	
		<!-- ---------------Nội dung thông báo  -------------------- -->
 <div class="container" id="Xem thông tin">
 <div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Xem thông tin <?php echo $title?>  </h2>
				</div>
				<Form action="ShowThongTin " method="post" style="margin: 5px 5px;">
					<select name="TT" id="TT">
						<option value="ThongBao">Thông Báo</option>
						<option value="QuiDinh">Qui định</option>
						<option value="LienHe">Liên hệ</option>
						
					</select>
					<Button type="submit" style="border-color: white; margin-left: 10px; width: 30px; height: 30px; Border-radius: 5px;">
						<a href=""><i class="fa-sharp fa-solid fa-search"></i>
						</a>
					</Button>
				</Form>

		
			<div class="panel-body">
			
				<table class="table table-bordered">
				<?php
				
				// $maSV, N'$fullname', '$date1', $namNH, $gioiTinh, $sdt, N'$diaChi',$maCTDT ";
					if (isset($data['QD'])) {
					echo '  
					<thead>
						<tr>
							<th>STT</th>
							<th>Loại</th>
							<th>Nội dung</th>
							<th>Ngày tạo</th>
							
							<th width="60px"></th>
							
						</tr>
					</thead>
					<tbody>';

						
	                        while ($std = sqlsrv_fetch_array($data['QD'], SQLSRV_FETCH_ASSOC)) {

		                        echo '<tr>
								<td>' . $stt++ . '</td>
			<td>' . $std['loai'] . '</td>
			<td>' . $std['content'] . '</td>
			<td>' . date_format($std['date'], "d/m/Y") . '</td>
			
			
			<td id= "deleteSV"><button class="btn btn-danger"id= "deleteSV" onclick="DeleteQD('.$std['id'].')" >
			<a style="text-decoration: none; color: white;" 
			id= "deleteSV" ; 
			>Delete</a></button></td>

		</tr>';
	                        }
                        }
				if (isset($data['TB'])) {
					echo '  
							<thead>
								<tr>
									<th>STT</th>
									<th>Loại</th>
									<th>Nội dung</th>
									<th>Ngày tạo</th>
									
									<th width="60px"></th>
									
								</tr>
							</thead>
							<tbody>';


					while ($std = sqlsrv_fetch_array($data['TB'], SQLSRV_FETCH_ASSOC)) {

						echo '<tr>
										<td>' . $stt++ . '</td>
					<td>' . $std['loai'] . '</td>
					<td>' . $std['content'] . '</td>
					<td>' . date_format($std['date'], "d/m/Y") . '</td>
					
					
					<td id= "deleteSV"><button class="btn btn-danger"id= "deleteSV" onclick="DeleteTB(' . $std['id'] . ')" >
					<a style="text-decoration: none; color: white;" 
					id= "deleteSV" ; 
					>Delete</a></button></td>
		
				</tr>';
					}
				}
                        ?>

<?php
				
				// $maSV, N'$fullname', '$date1', $namNH, $gioiTinh, $sdt, N'$diaChi',$maCTDT ";
					if (isset($data['LH'])) {
					echo '  
					<thead>
						<tr>
							<th>STT</th>
							<th>Bộ phận</th>
							<th>SDT</th>
							<th>Địa chỉ</th>
							<th>Email</th>
							
							<th width="60px"></th>
							
						</tr>
					</thead>
					<tbody>';

						
	                        while ($std = sqlsrv_fetch_array($data['LH'], SQLSRV_FETCH_ASSOC)) {

		                        echo '<tr>
								<td>' . $stt2++ . '</td>
			<td>' . $std['host'] . '</td>
			<td>' . $std['Sdt'] . '</td>
			<td>' . $std['diaChi']. '</td>
			<td>' . $std['email']. '</td>
			
			
			<td id= "deleteSV"><button class="btn btn-danger"id= "deleteSV" onclick="DeleteLH('.$std['id'].')" >
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
	</script>

	
</body>
<Style>
        .QD :hover {
            textext-decoration: none;
        }
    </Style>
<style>
                .content div div a{
               border-radius: 5px ;
           }
           .content .tab  {
            overflow: scroll;
           }
                </style>
<style>
                .content .tab.active{
                    display: block;
                    width: 640px;
                }

                .content .btn_next_page .page.active{
                    background-color: blue;
                }
            </style>
</html>