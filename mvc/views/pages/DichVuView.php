<!-- ------------------Nội dung dich vụ ----------------- -->
<div class="noidung">
    <style>
        ul.DV>li>a>div {
            margin-top: 10px;
        }
        .DV{
            margin: 20px 85px;
        }

        ul.DV>li {
            background-color: #AFEEEE;
            margin-top: 1px;
            overflow: hidden;
            text-align: center;
            align-items: center;
            margin-left: 10px;
            
        }
        ul.DV>li:hover{       
          transform: scale(1.1);
          transition: all 0.3s ease-in-out;
          background-color: #4682B4;
        }
        .menu ul li a:visited{
            color: white;
        }
     
       
        
    </style>
    <script>
        active_menu();
        var DV = document.getElementById('DV');
        DV.className += " active";

       
    </script>
    <Script>
         function Edit_Infor(){
            location.href= "UpdateSV?MSSV=<?php echo $_SESSION['id_user']?> "
        }
    </Script>
    <ul class="DV" style="text-align: center; 
            margin-left: 212px; margin-right: 100px;">

        <li value=" ninh" class="dichvu">
           <a onclick="Edit_Infor()" class="dichvu_action"> 
                <div><b> CHỈNH SỬA THÔNG TIN </b> </div>
                <img id="img_dichvu" src="../public/image/ic-thubaotinnhan.svg" alt="">
                <p> Chỉnh sửa thông tin cá nhân </p>
            </a>
        </li>
        <li value=" ninh">
            <a href="profile" style="text-align: center;">
                <div> <b> HỒ SƠ SINH VIÊN </b></div>
                <img id="img_dichvu" src="../public/image/ic-hososv.svg" alt="">
                <p> Thông tin chi tiết cơ bản của sinh viên</p>
            </a>
        </li>
        <li value=" ninh">
            <a href="TKB" class="dichvu_action">
                <div> <b> THỜI KHOÁ BIỂU </b></div>
                <img id="img_dichvu" src="../public/image/ic-thoikhoabieu.svg" alt="">
                <p> Thời khoá biểu của sinh viên </p>
            </a>
        </li>
        <li value=" ninh">
            <a href="KQHT">
                <div><b>KẾT QUẢ HỌC TẬP</b> </div>
                <img id="img_dichvu" src="../public/image/ic-ketquahoctap.svg" alt="">
                <p> Kết quả học tập của sinh viên </p>
            </a>
        </li>

        <li value=" ninh">
            <a href="UV_register">
                <div><b>ĐĂNG KÍ HỌC TẬP</b> </div>
                <img id="img_dichvu" src="../public/image/ic-dkhoctap.svg" alt="">
                <a href="UV_register"><p> Đăng kí học tập của sinh viên </p></a>
            </a>
        </li>
        <li value=" ninh">
            <a href="UV_hocphi">
                <div><b>HỌC PHÍ</b> </div>
                <img id="img_dichvu" src="../public/image/ic-hocphi.svg" alt="">
                <p> Các thông báo học phí của sinh viên </p>
            </a>
        </li>
        <li value=" ninh">
            <a href="UV_CTDT">
                <div style="font-size: 17px;"><b>CHƯƠNG TRÌNH ĐÀO TẠO</b></div> 
                <img id="img_dichvu" src="../public/image/ic-daotao.svg" alt="">
                <p> Học phần trong CTDT</p>
            </a>
        </li>

       

        

    </ul>

</div>