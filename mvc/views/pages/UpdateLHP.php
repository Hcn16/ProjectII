<?php if (isset($data['dataClass'])) {
    while ($std = sqlsrv_fetch_array($data['dataClass'], SQLSRV_FETCH_ASSOC)) {
        $maLHP = $std['maLopHocPhan'];
        $maMH = $std['maMonHoc'];
        $namHoc = $std['namHoc'];
        $hocKy = $std['hocKy'];
        $tenMonHoc = $std['tenMonHoc'];
        $tenNhanVien = $std['hoTen'];
        $ngonNguGiangDay = $std['ngonNguGiangDay'];
        $moTa = $std['moTa'];
        $maxSinhVien = $std['maxSinhVien'];
        $TKB = $std['TKB'];
        $soLuong = $std['soLuong'];
        $day = $std['day'];
        $startDate = date_format($std['startDate'], "d/m/Y");
        $endDate = date_format($std['endDate'], "d/m/Y");
        $startTime = date_format($std['startTime']," H:i");
        $endtime = date_format($std['endTime']," H:i");			                            	
    }
}

?>

<div class="btn_next_page">
			<div class="Back" style="padding: 0.5% 2%;
		background-color: #cccccc;
		display: flex;
"><a href="AV_classManagement"><i class="fa-solid fa-arrow-left"
						style="font-size: 25px;border-radio:1px solid blue;"></i> </a>
			</div>
		</div>
<div style="display: flex;">
    <!-- Add student -->
    <style>
        .container {
            border: 3px solid black;
            margin: 30px 40px;
        }
    </style>
   
    <div id="Tạo Lớp" class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Lớp: <?php echo $tenMonHoc.'- '.$maLHP?> </h2>
            </div>
            <div class="panel-body">
                <form name="insertLop" action="insertLop" method="post">
                    <div class="form-group">
                        <label for="namHoc">Năm học: <?php echo $namHoc.'- '.$hocKy?> </label>
                        
                    </div>

                   

                    <div class="form-group">
                        <label for="LH"><b>Lịch học</b></label> </br>
                        <label for="Day">Thứ: <?php echo $day?></label></br>          
                        <label for="startTime">Thời gian bắt đầu: <?php echo $startTime?> </label></br>
                        
                        <label for="giaoVien">Thời gian kết thúc: <?php echo $endtime?></label></br>
                         <label for="giaoVien">Ngày bắt đầu: <?php echo $startDate?></label></br>
                         <label for="giaoVien">Ngày kết thúc: <?php echo $endDate?></label></br>
                       
                    </div>

                    <div class="form-group">
                        <label for="giaoVien">Giáo viên: <?php echo $tenNhanVien?> </label></br>

                    </div>


            <div class="form-group">
                <label for="language">Ngôn ngữ giảng dạy: <?php echo $ngonNguGiangDay?> </label></br>
                
            </div>

            <div class="form-group">
                <label for="moTa">Mô tả: <?php echo $moTa;?> </label>
                
            </div>
            <div class="form-group">
                <label for="maxSV">Số lượng tối đa sinh viên: <b> <?php echo $maxSinhVien?> </b></label>
                

            </div>

           
            </form>
        </div>
    </div>
</div>

<!-- Add student -->
<div id="Tạo Lớp" class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Chỉnh sửa Lớp: <?php echo $tenMonHoc.'- '.$maLHP?></h2>
        </div>
        <div class="panel-body">
            <form name="updateLHP" action="check_updateLHP?maClass=<?php echo  $maLHP?>" method="post">
            
        </div>
        <div class="form-group">
            <label for="namHoc">Năm học</label>
            <?php  $date = getdate();
            ///echo $t;?> 
            <input required="true" type="number" min="2019" max="<?php echo $date['year']?>" class="form-control" id="namHoc" name="namHoc" placeholder="<?php echo $namHoc?>  ">
        </div>

        <div class="form-group">
            <label for="hocKi">Học kì: </label>
            <select name="hocKi">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>

       

        
        <div class="form-group">

            <label for="LH"><b>Lịch học</b></label> </br>
            <label for="Day">Thứ:  </label>
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
            <input style="width: 40%;" required="true" type="time" class="form-control" name="startTime"
                placeholder="Start time ">
            <label for="giaoVien">Thời gian kết thúc</label>
            <input style="width: 40%;" required="true" type="time" class="form-control" name="endTime"
                placeholder="End time  ">
            <label for="giaoVien">Ngày bắt đầu</label>
            <input style="width: 40%;" required="true" type="date" class="form-control" name="startDate"
                placeholder="Start date  ">
            <label for="giaoVien">Ngày kết thúc</label>
            <input style="width: 40%;" required="true" type="date" class="form-control" name="endDate"
                placeholder="End date  ">

        </div>

        <div class="form-group">
            <label for="giaoVien">Giáo viên:  </label>
            <select style="width:300px" ; name="giaoVien" id="giaoVien">
                <optgroup>
                    <?php  
                    echo $maMH;
                    if (isset($data['dataGV'])) {
                                echo $maMH;
                                $tt = substr($maMH, 0, 2);
                                $test = substr($maMH, 2,1);
                                if(ord($test) > 60){
                                    $tt = $tt . $test;
                                }

                                echo $tt;

                                while ($std1 = sqlsrv_fetch_array($data['dataGV'], SQLSRV_FETCH_ASSOC)) {
                                    if (($tt == $std1['maKhoa'])) {
                                        
                                        echo '  
										 		<option  name="giaoVien" value="' . $std1['maNhanVien'] . '">' . $std1['hoTen'] . '</option>
										 		';
                                    }
                                }
                            

                        } ?>
                </optgroup>
            </select>
        </div>
        <Script>

        </Script>

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
            
            <input required="false" type="text" class="form-control" id="moTa" name="moTa" placeholder=" ">
            
        </div>
        <div class="form-group">
            <label for="maxSV">Số lượng tối đa sinh viên:</label>
            <input required="true" type="number" min="<?php echo $maxSinhVien?>" max="120"class="form-control" id="maxSV" name="maxSV" value="maxSV1"
                placeholder="">

        </div>
        <script>
            function confirmUpdate(){
                alert("Xác nhận thay đổi thông tin?")
            }
        </script>
        <button class="btn btn-success" onclick="confirmUpdate();">Cập nhập </button>
        
        </form>
    </div>

</div>


</div>