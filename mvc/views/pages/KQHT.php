<?php

$stt = 1;

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
		margin-top: 5px;
        
	}
</style>


<body>
<script>
        active_menu();
        var DV = document.getElementById('DV');
        DV.className += " active";
    </script>
	<Div class="Parent1">

		<div class="btn_next_page">
			<div class="Back"><a href="DichVuView"><i class="fa-solid fa-arrow-left"
						style="font-size: 25px;border-radio:1px solid blue;"></i> </a>
			</div>
			
		</div>		

		<!-- Trang CTDT-->
		<div id="CTDT" class="container">
            
					<table class="table table-bordered">
						<thead>
							<tr>
							    <th>STT</th>
                                <th>Mã học phần</th>
                                <th>Tên học phần</th>	  
								<th>Học kì</th>	
                                <th>Điểm quá trình</th>							
								<th>Điểm cuối kì</th>                            															
							</tr>
						</thead>
						<tbody>
                            <?php
                            if (isset($data['point_sv'])) {
                                while ($std1 = sqlsrv_fetch_array($data['point_sv'], SQLSRV_FETCH_ASSOC)) {
                                    echo '<tr>
                                    <td>' . $stt++ . '</td>					
                                    <td>' . $std1['maMonHoc'] . '</td>
                                    <td>' . $std1['tenMonHoc'] . '</td>
                                    <td>'.$std1['namHoc'].'- ' . $std1['hocKy'] . '</td>				
                                    <td>' . $std1['QT'] . '</td>
                                    <td>' . $std1['CK'] . '</td>
                                    
                                
                                    
                                    
                        
                                </tr>';

                                }
                            }
						
    
                            
                            ?> 


						
						</tbody>
					</table>
			
		</div>
	
		

       
	



	</Div>

	
	

    
</body>

</html>