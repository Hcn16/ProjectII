<style>
    *{
        margin:0;
        padding: 0;
    }

    .container{
         width: 100%;
        
    display: block;
    justify-content: center;
    align-items: center;
    
    }
    .panel-heading{
        
    }
</style>
<div class="container" >

<div class="panel-heading">
				<h2 class="text-center">Tra cứu mã Sinh Viên</h2>
				<!-- show student -->
	<div id="Xem sinh viên" class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				
				<form action="ShowSinhVien2" method="post">
					<input type="number" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;"
						placeholder="Tìm kiếm theo MSSV">
					
				</form>

			</div>
			<div class="panel-body">
				<table class="table table-bordered" id="Table">
                <?php

                        // $maSV, N'$fullname', '$date1', $namNH, $gioiTinh, $sdt, N'$diaChi',$maCTDT ";
                    if (isset($data['dataSinhVien'])) {
                    echo '<thead>
						<tr>
							<th>MSSV</th>
							<th>Họ & Tên</th>
							<th>Ngày sinh</th>
							<th>năm NH</th>
							<th>Giới tính</th>
							<th>SDT</th>
							<th>Địa chỉ</th>
							<th>CTDT</th>
							
						</tr>
					</thead>
					<tbody>';

						
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

</div>
<div class="panel-heading">
				<h2 class="text-center">Tìm kiếm Giáo Viên</h2>
					<!-- show teacher -->
	<div id="Xem giáo viên" class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<form action="ShowGV2" method="post">
					<input type="number" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;"
						placeholder="Tìm kiếm theo mã giáo viên">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
                    
						<?php

                // $maSV, N'$fullname', '$date1', $namNH, $gioiTinh, $sdt, N'$diaChi',$maCTDT ";
                if (isset($data['dataGiaoVien'])) {
                            echo '<thead>
						<tr>
							<th>Mã Giáo Viên</th>
							<th>Họ & Tên</th>
							<th>Ngày sinh</th>
							<th>Giới tính</th>
							<th>SDT</th>
							<th>Địa chỉ</th>

						
						</tr>
					</thead>
					<tbody>';

	                        while ($std = sqlsrv_fetch_array($data['dataGiaoVien'], SQLSRV_FETCH_ASSOC)) {

		                        echo '<tr>
							<td>' . $std['maNhanVien'] . '</td>
							<td>' . $std['hoTen'] . '</td>
							<td>' . date_format($std['ngaySinh'], "d/m/Y") . '</td>			
							<td>' . $std['gioiTinh'] . '</td>
							<td>' . $std['Sdt'] . '</td>
							<td>' . $std['diaChi'] . '</td>
		
						
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
</div>
</div>

<script>
        active_menu();
        var DV = document.getElementById('TC2');
        DV.className += " active";
    </script>

<script>

$(document).ready(function () {

    $("#Table").select2({

        placeholder: "Select a State",

        allowClear: true							
    });
    

});

</script>