<?php

$stt = 1;
$stt2 = 1;
$tongTC = 0;
$tongTC_dat = 0;
$TB = 0.0;
$result=["maLHP"=>array(),"maMonHoc"=>array(),"QT"=>array(),"CK"=>array()];
$status = "";
$dem = 0;
$tong = 0;
$chuaqua = 0;
$diemChu = "";
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
	.Parent .btn_next_page .Back {
		width: 30px;
		Height: 30px;
		
	}
</style>

<body>

<script>
        active_menu();
        var DV = document.getElementById('DV');
        DV.className += " active";
    </script>
	<Div class="Parent1">

		<div class="btn_next_page" style="background-color: burlywood;margin-top: 0px; margin-lelf: 5px;">
			<div class="Back"><a href="DichVuView"  style="margin-top: 10px;"><i class="fa-solid fa-arrow-left"
						style="font-size: 25px;border-radio:1px solid blue; "></i> </a>
			</div>
			
		</div>		

		<!-- Trang CTDT-->
		<div id="CTDT" class="container">

					<table class="table table-bordered">
						<thead>
							<tr>
							<th>STT</th>
								<th>Mã học phần </th>
								<th>Tên học phần</th>
								<th>Thể loại</th>	
                                <th>Số tín chỉ</th>
                                <th>Điểm số</th>							
								<th>Điểm chữ</th>                            
								<th>Trạng thái</th>
																
							</tr>
						</thead>
						<tbody>

							<?php
							if (isset($data['studentProgram'])) {
								while ($std = sqlsrv_fetch_array($data['studentProgram'], SQLSRV_FETCH_ASSOC)) {
									$result['maLHP'][] = $std['maLopHocPhan'];
									$result['maMonHoc'][] = $std['maMonHoc'];
									$result['QT'][] = $std['QT'];
									$result['CK'][] = $std['CK'];
									
								}

							}
							
							if (isset($data['showMonHoc'])) {
								while ($std1 = sqlsrv_fetch_array($data['showMonHoc'], SQLSRV_FETCH_ASSOC)) {
									
											$tongTC += $std1['soTinChi'];
									for ($i = 0; $i < count($result['maMonHoc']); $i++) {
										if ($std1['maMonHoc'] == $result['maMonHoc'][$i]) {										
											$TB = ($result['QT'][$i]*$std1['tsQT'] + $result['CK'][$i]*$std1['tsCK']);
											if(($result['CK'][$i] != 0) && ($result['QT'][$i] != 0)){
												
											
											
											
											if($TB >0){
												$dem++;
											}
											if($TB > 3){
												$status = "Đã qua";
												$tongTC_dat += $std1['soTinChi'];

											}
											if($TB <3 && $TB >0){
												$status = "Chưa qua";
												$chuaqua++;

											}
										

											if($TB >=0 && $TB <=3){
												$diemChu = "F";
												$TB = 0;
											}
											else if($TB >3 && $TB <=4.9){
												$diemChu = "D";
												$TB = 1.0;
											}
											else if($TB >=5 && $TB <=5.5){
												$diemChu = "D+";
												$TB = 1.5;
											}
											else if($TB >=5.6 && $TB <=5.9){
												$diemChu = "C";
												$TB = 2.0;
											}
											else if($TB >=6 && $TB <=6.9){
												$diemChu = "C+";
												$TB = 2.5;
											}
											else if($TB >=7 && $TB <=7.5){
												$diemChu = "B";
												$TB = 3.0;
											}
											else if($TB >7.6 && $TB <=8.4){
												$diemChu = "B+";
												$TB = 3.5;
											}
											else if($TB >=8.5 && $TB <=9.4){
												$diemChu = "A";
												$TB = 4.0;
											}
											else if($TB >=9.5 && $TB <=10){
												$diemChu = "A+";
												$TB = 4.0;
											}
											$tong += $TB;
											break;
											
										}
										else{
											$TB = "";
										}
											
																				
											
										} else {
											$TB="";
											$diemChu = "";
										}
									}
									
											echo '<tr>
												<td>' . $stt++ . '</td>					
												<td>' . $std1['maMonHoc'] . '</td>
												<td>' . $std1['tenMonHoc'] . '</td>
												<td>' . $std1['theLoai'] . '</td>				
												<td>' . $std1['soTinChi'] . '</td>
												<td>' . $TB . '</td>
												<td>' . $diemChu . '</td>
												<td>' . $status . '</td>
											
												
												
									
											</tr>';
									$status = "";
										}
										}
									
								
		
	                        
                        
                        ?>
		<?php 	
			if($tongTC != 0){
				if($dem!=0){$CPA = round($tong/$dem,2);}
				else{$CPA = 0;}

	        echo '<tr>
			<td> </td>
			<td></td>
			<td></td>

			
			
			<td>Tổng số tín chỉ đạt:</td>
			<td> '.$tongTC_dat.'/'.$tongTC.' </td>

			<td></td>

		</tr>';
        echo '<tr>
        <td> </td>
        <td></td>
        <td></td>

        
        
        <td>CPA hiện tại:</td>
        <td> '.$CPA.' </td>

        <td></td>

    </tr>';
   
			}
		$_SESSION['CPA'] = $CPA;
		
		$_SESSION['TCD'] = $tongTC_dat;
		$_SESSION['TCCQ'] = $chuaqua;
		?> 
		
						</tbody>
					</table>
			
		</div>
	
		

       
	



	</Div>

	
	

    
</body>

</html>