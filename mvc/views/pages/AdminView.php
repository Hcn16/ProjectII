<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading" style="margin-top: 20px;text-align: center; font-size: 30px;">
			Quản lý chung
			<!-- <form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên">
				</form> -->
		</div>
		<div class="panel-body">



			<Style>
				a {
					text-decoration: none;
					text-decoration-color: black;
					color: white;

				}

				.panel-body {
					display: flex;
					width: 1400px;
					height: 600px;
					margin-left: -150px;
					background-color: gray;
					margin-bottom: 50px;
				}

				.btn {
					width: 150px;
					height: 60px;
					margin-bottom: 5px;
					margin-top: 20px;
					border-radius: 5px;
				}

				.Bt {
					display: grid;
					height: 220px;

				}

				.Icon {
					width: 100%;
    				height: 100%;
					background-image: url('../public/image/admin_image.png');
					background-repeat: no-repeat;
					background-size: cover;
				
				}
			</Style>
			<div class="Bt">
				<?php if ( ($_SESSION['theLoai']) == 2) {
	                ?>
				<button class="btn btn-success "><a href="AV_pointManagement" style="">Quản lí điểm sinh viên</a>
				</button>

				<?php } else { ?>
				<button class="btn btn-success"><a href="AV_userManagement" style="">Quản lí người dùng</a> </button>
				<button class="btn btn-success "><a href="AV_pointManagement" style="">Quản lí điểm sinh viên</a>
				</button>
				<button class="btn btn-success"><a href="AV_classManagement" style="">Quản lí lớp</a> </button>
				<button class="btn btn-success"><a href="AV_infor_other" style="">Thông tin khác</a> </button>
				
				<?php } ?>
			</div>
			<div class="Icon">

				
				
				
			</div>
		</div>
	</div>
</div>