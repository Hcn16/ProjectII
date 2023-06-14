<style>
    
    .box{
        width: 60%;
        
    justify-content: center;
    align-items: center;
    display: block;
    margin-left: 20%;

       
    }
    .content1{
        background-color: white;
    }
</style>
<div class="box">
    <div class="Titile" style="font-size: 20px;margin-top:20px;color:red;"><b>ĐẠI HỌC TỔNG HỢP</b> </div><br><br>
    
    <div class="content1">
    <?php
           if (isset($data['lienHe'])) {
            while ($std = sqlsrv_fetch_array($data['lienHe'], SQLSRV_FETCH_ASSOC)) {
                   echo '
                   <span><b>'.$std['host'].'</b></span><br>
                   <span>'.$std['diaChi'].'</span><br>
                   <span>'.$std['Sdt'].'</span><br>
                   <span>'.$std['email'].'</span><br><br>
                    ';
                
            }

        }
           ?> 
       
    </div>
</div>
<script>
        active_menu();
        var DV = document.getElementById('LH');
        DV.className += " active";
    </script>