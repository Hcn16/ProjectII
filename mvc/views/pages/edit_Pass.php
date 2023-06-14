<div id="Thêm qui định" class="container">
<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Chỉnh sửa thông tin người dùng </h2>
				</div>
				<div class="panel-body">
					<form action="EditPass2?id=<?php echo $_GET['id']?> " method="post">
						<div class="form-group">
							<label for="usr">Nhập mật khẩu cũ:</label>
							<input required="true" type="passWord" class="form-control" id="oldPass" name="oldPass" onchange="setPass()"
								placeholder="  ">
						</div>
						
                        <div class="form-group">
							<label for="usr">Nhập mật khẩu mới:</label>
							<input required="true" type="passWord" class="form-control" id="newPass" name="newPass" onchange="setPass()"
								placeholder="  ">
						</div>
						
					

						<button class="btn btn-success" onclick="Tbao()">Lưu </button>

					</form>
				</div>
			</div>
            </div>

<script>
    function Tbao() {
        
    }
    function setPass(){
      var oldPass = "<?php echo $_SESSION['pass'];?>";
      console.log(oldPass);
      var pass =  oldPass.trim();
     
      console.log(pass.length);
      
       var e = document.getElementById('oldPass');
       console.log(e.value);
       console.log(e.value.length);
       if(e.value != pass){
        alert('Mật khẩu nhập không đúng, hãy nhập lại!');
        e.value = "";
        e.style.borderColor = "red";
       }
       if(e.value == pass){
        e.style.borderColor = "green";
       }
    }
</script>
