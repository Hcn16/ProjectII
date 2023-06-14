
<script src="../public/js/ajax.js"></script>

<!-- Select Tỉnh Quận Huyện -->
<div class="btn_next_page">
			<div class="Back"><a href="DichVuView"><i class="fa-solid fa-arrow-left"
						style="font-size: 25px;border-radio:1px solid blue;"></i> </a>
			</div>
			
		</div>	
<div class="container" style="margin-left: 50px;">
    <p>Kì học: </p>
    <select name="namHoc" class="namHoc" id="namHoc">

        <option value="">--Chọn kì học--</option>
        <?php
     
                            if (isset($data['NamHoc'])) {
                                
                                while ($std = sqlsrv_fetch_array($data['NamHoc'], SQLSRV_FETCH_ASSOC)) {
                                    
                                    echo ' <option value="'.$std['namHoc'].'-'.$std['hocKy'].'">'.$std['namHoc'].'-'.$std['hocKy'].'</option>';
                                    
                                }
                            }
                          

                            ?>
    </select>

    <table id="TKB" class="table table-bordered" name="TKB" style="margin: 15px 95px;">
       
    </table>

   
</div>
<script>
    $('#namHoc').change(function() {
        namHoc = $('#namHoc').val();
        console.log(namHoc);
        $.post(
            "showTKB",

            { 'namHoc': namHoc },
            function(data) {
                $("#TKB").html(data);
            }

        );

    });
</script>
<script>
        active_menu();
        var DV = document.getElementById('DV');
        DV.className += " active";
    </script>

<script></script>


