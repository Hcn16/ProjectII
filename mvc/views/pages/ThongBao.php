<link rel='stylesheet' type='text/css' media='screen' href='../public/css/Thongbao.css'>
    <script src='../public/js/Thongbao.js'>    </script>
    <script>
        active_menu();
        var DV = document.getElementById('TB');
        DV.className += " active";
    </script>
<!-- ---------------Nội dung thông báo  -------------------- -->
 <div class=" menu_tbao" style="display: flex ;">
        <div class=" menu" style="margin-left: 18%;">
            <ul>             
                <li ><a href="showTB_loai">Thông báo</a>
                    <ul>
                        <li><a href="showTB_loai?TB=DH"> Đại học </a></li>
                        <li><a href="showTB_loai?TB=SDH">Sau đại học</a> </li>
                        <li><a href="showTB_loai?TB=VLVH"> Vừa làm vừa học</a></li>
                    </ul>
                </li>
               

                
            </ul>
        </div>
      
        
        <div class="content">
            <p class=" head">TIN TỨC THÔNG BÁO</p>
            <div class="line1"> </div>
            <style>
                .content div div a{
               border-radius: 5px ;
           }
           .content .tab  {
            overflow: scroll;
           }
                </style>
            <div id = "1" class="tab active">

           <?php
           if (isset($data['ThongBao'])) {
            while ($std = sqlsrv_fetch_array($data['ThongBao'], SQLSRV_FETCH_ASSOC)) {
                   echo '
                   <div class="sub_tintuc">
                       <a href=""><b>['.$std['loai'].']</b>'.$std['content'].' <br> '. date_format($std['date'], "d/m/Y") .'</a>
                   </div>
                    ';
                
            }

        }
           ?> 

                
            </div>




   

          
            <style>
                .content .tab.active{
                    display: block;
                    width: 640px;
                }

                .content .btn_next_page .page.active{
                    background-color: blue;
                }
            </style>
          
        </div>

       
    </div>