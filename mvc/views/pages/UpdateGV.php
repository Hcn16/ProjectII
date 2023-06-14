<?php if (isset($data['dataGiaoVien'])) {
    $ngaySinh = date_create();
    while ($std = sqlsrv_fetch_array($data['dataGiaoVien'], SQLSRV_FETCH_ASSOC)) {
       
        $maGV = $std['maNhanVien'];
		$fullname = $std['hoTen'];
		
 
        // $newformat = date('d-m-Y',strtotime($std['ngaySinh']));
 

		$gioiTinh = $std['gioiTinh'];
	    $Sdt = $std['Sdt']; 
		$diaChi = $std['diaChi'];
      
    }
}
$a = "CheckUpdateGV?maGV=";
$query = $a.$maGV;
$text = 'AV_userManagement?show1=3&show=Xem giáo viên';

?>
<?php if(true){?> 
<div id="Thêm sinh viên" class="container">
    <Script>
        function Text(){
            return "Xem giáo viên";
        }
    </Script>
   

<div class="Back"><a href="<?php echo $text; ?>"><i class="fa-solid fa-arrow-left"
						style="font-size: 25px;border-radio:1px solid blue;"></i> </a>
			</div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Chỉnh sửa Giáo Viên</h2>
        </div>
        <div class="panel-body">
            <form action= "<?php echo $query ?>" method="post">

                <div class="form-group">
                    <label for="usr">Họ Tên:</label>
                    <input required="true" type="text" class="form-control" id="usr" name="fullname"
                        placeholder="" value="<?php echo $fullname ?>">
                </div>
                <div class="form-group">
                    <label for="ngaySinh">Ngày sinh:</label>
                    <input required="true" type="date" class="form-control" id="ngaySinh" name="ngaySinh"
                        placeholder="<?php echo $newformat ?>">
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
                    <input required="true" type="tel" class="form-control" 
                    minlength="10" maxlength="10" max="999999999"id="sdt" name="sdt" placeholder=" " value="<?php echo $Sdt ?>">
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

                <button class="btn btn-success" onclick="Tbao()">Lưu </button>
            </form>
        </div>
    </div>
</div>
<?php }?>