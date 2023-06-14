<?php
session_start();


class Home extends Controller
{

    
  
 

    public $Class;
    public $Subject;
    public $SV;
    public $GV;
   
    public function getClass(){
        $this->Class = $this->model("ClassModel");
        return $this->Class;
    }

    public function getSubject(){
        $this->Subject = $this->model("MonHocModel");
        return $this->Subject;
    }

    public function getSV(){
        $this->SV = $this->model("SinhVienModel");
        return $this->SV;
    }

    public function getGV(){
        $this->GV = $this->model("GiaoVienModel");
        return $this->GV;
    }


    function Home1()
    {
        
        $this->view("master2", [   
            "DV_view" => "GeneralView"        
        ]);
    }

    function test(){
        
        $this->view("test", [   
                  
        ]);
    }

    function login(){
        $this->view("login");
    }

    function checkLogin(){
        $Subject = $this->model('MonHocModel');
        $login = $this->model("loginModel");
        $address =  $this->model("address");
        $_SESSION['dataSUB'] = $Subject->showMonHoc();
        
       $row_count = sqlsrv_num_rows( $login->check_User() );
       
       if ($row_count === false || $row_count == 0)  
          {
           
            $this->view("login", [

                        "failedConnect" => "tai khoan hoac mk sai moi nhap lai"
                    ]);
          }  
       if ($row_count >0)  
       $this->view("master2", [
        "user" => $login->check_User(),
        "dataSubject" => $Subject->showMonHoc(),
        "province" => $address->showProvince(),
        "DV_view" => "GeneralView" 
    ]);
        
       
    }

    
    
    function SayHi()
    {
        $teo = $this->model("SinhVienModel");

        $this->view("aoden", [
            "ctdt" => $teo->getCTDT(),
            "isert_ctdt" => $teo->insertCTDT()
        ]);

    }

    function DichVuView(){
        
        $this->view("master2",[
            "DV_view" => "DichVuView"
        ]);
    }

    function AdminView(){
        $this->view("master2",[          
            "DV_view" => "AdminView"
        ]);
    }
    function GeneralView(){   
        $this->view("master2",[
            "DV_view" => "GeneralView"
        ]);
    }

    function ThongBao(){
        
        $this->view("master2",[
            "DV_view" => "ThongBao"
        ]);
    }
    function insertTB(){
        $QD = $this->model('QuiDinhModel');
        if ($QD->InsertTB() == true) {
            $this->view("master2", [
                "DV_view" => "AV_infor_other",
                "status" => "Success"
            ]);
        }
        else{
                $this->view("master2", [
                    "DV_view" => "AV_infor_other",
                   "status" => "Fail"
                ]); 
        }
    }

    function insertQD(){
        $QD = $this->model('QuiDinhModel');
     
        if ($QD->InsertQD() == true) {
            echo "vào inset ";
            $this->view("master2", [
                "DV_view" => "AV_infor_other",
                "status" => "Success",
                "show" =>"Thêm qui định",
                "show1" =>"1"
            ]);
        }
        else{
                $this->view("master2", [
                    "DV_view" => "AV_infor_other",
                   "status" => "Fail"
                ]); 
        }
    }

    function insertLH(){
        $QD = $this->model('QuiDinhModel');
     
        if ($QD->InsertLH() == true) {
            echo "vào inset";
            $this->view("master2", [
                "DV_view" => "AV_infor_other",
                 "status" => "Success",
                "show" =>"Thêm liên hệ",
                "show1" =>"2"
            ]);
        }
        // else{
        //         $this->view("master2", [
        //             "DV_view" => "AV_infor_other",
        //            "status" => "Fail"
        //         ]); 
        // }
    }

    function QuiDinh(){
        $QD = $this->model('QuiDinhModel');
        $this->view("master2",[
            "DV_view" => "QuiDinh",
            "QuiDinh" => $QD->showQD_DH()         
        ]);
    }

    function showTB_loai(){
        $QD = $this->model('QuiDinhModel');
        $this->view("master2",[
            "DV_view" => "ThongBao",
            "ThongBao" => $QD->showTB_loai()         
        ]);
    }

    function QuiDinh_Admin(){
        $QD = $this->model('QuiDinhModel');
        $this->view("master2",[
            "DV_view" => "AV_infor_other",
            "QuiDinh" => $QD->showQD_DH(),
                
        ]);
    }

    function ShowThongTin(){
        $QD = $this->model('QuiDinhModel');
        
        $this->view("master2",[
            "DV_view" => "AV_infor_other",
            "QD" => $QD->showTT(),
            "LH" => $QD->showLH(),
            "TB" => $QD->showTB(),
            "show" => "Xem thông tin",
            "show1" => "3"      
        ]);
    }

    function AV_infor_other(){
        $QD = $this->model('QuiDinhModel');
        $this->view("master2",[
            "DV_view" => "AV_infor_other",
            "QD" => $QD->showQD_DH()       
        ]);
    }

    function AV_userManagement(){ 
        $SV = $this->model('SinhVienModel');
        $GV = $this->model('GiaoVienModel');
        $address = $this->model('address');
       
        $this->view("master2",[
            "DV_view" => "AV_userManagement",
            "dataSinhVien"=> $SV->ShowSinhVien(),
            "dataGiaoVien"=> $GV->ShowGV(),
            "province" => $address->showProvince(),
            "province2" => $address->showProvince(),
            
        ]);
        
    }

    function AV_classManagement(){
        $Class = $this->model("ClassModel");      
        $Subject = $this->model('MonHocModel');
        $GV= $this->model('GiaoVienModel');
        
        
        $this->view("master2",[
            "DV_view" => "AV_classManagement",
            "dataSubject" => $Subject->showMonHoc(),
            "dataGV"=> $GV->ShowGV(),
            "SL_SV"=> $Class->SL_SV_Class(),
            "dataClass"=> $this->getClass()->ShowClass(),
            
        ]);
    }

    function AV_pointManagement(){
        $Class = $this->model('ClassModel');
        $this->view("master2",[
            "DV_view" => "AV_pointManagement",
            "dataClass"=> $Class->ShowClass(),
        ]);
    }

    //Thao tac Admin
    function insertSV(){
        $SV = $this->model('SinhVienModel');
        $GV = $this->model('GiaoVienModel');
        $address = $this->model('address');
        if($SV->InsertSV() == true){
            $this->view("master2",[
                "DV_view" => "AV_userManagement",
                "satus"=> " Đã thêm thành công",
                "dataSinhVien"=> $SV->ShowSinhVien(),
                "dataGiaoVien"=> $GV->ShowGV(),
                "province2" => $address->showProvince(),
                "show1"=> '1',
                "show"=>"Thêm sinh viên"
            ]);
        }
    }

    //thao tac Admin thêm lớp
    function insertLop(){
        $Class = $this->model('ClassModel');
        $Subject = $this->model('MonHocModel');
        $GV= $this->model('GiaoVienModel');
        if($Class->InsertLop() == true){
            $this->view("master2",[
                "DV_view" => "AV_classManagement",
                "satus"=> " Đã thêm thành công",
                "dataSubject" => $Subject->showMonHoc(),
                "dataGV"=> $GV->ShowGV()
                
            ]);
        }
    }

    function ShowGV_khoa(){
        $Class = $this->model('ClassModel');
        $Subject = $this->model('MonHocModel');
        $GV = $this->model('GiaoVienModel');
        if($Class->showGV_LHP() == true){
            $this->view("master2",[
                "DV_view" => "AV_classManagement",
                "satus"=> " Đã thêm thành công",
                "dataSubject" => $Subject->showMonHoc(),
                "dataGV" => $GV->showGV_LHP()
            ]);
        }
    }

    function ShowLop(){
        $Class = $this->model('ClassModel');
       
        if($Class->ShowClass() == true){
           
            $this->view("master2",[
                "DV_view" => "AV_classManagement",                     
                "dataClass"=> $Class->ShowClass(),
                "SL_SV"=> $Class->SL_SV_Class(),
                "dataSubject" => $this->getSubject()->showMonHoc(),
                "show" => "Quản lí lớp",
                "show1" => "1",
                "setURL" => "http://localhost/Project2_QLSinhvien/Home/AV_classManagement"
            ]);
            
        }
    }

    function UpdateLHP(){
        $Class = $this->model('ClassModel');
        $Subject = $this->model('MonHocModel');
        $GV = $this->model('GiaoVienModel');
            $this->view("master2",[
                "DV_view" => "UpdateLHP",                     
                "dataClass"=> $Class->ShowClass(),
                "dataSubject" => $Subject->showMonHoc(),
                "dataGV" => $GV->showGV_LHP()
            ]);
        
    }

   

    function delete_dk_LHP(){
        $Class = $this->model('ClassModel');
        if($this->getSV()->delete_dk_LHP() ==  true){
            $this->view("master2",[
                "DV_view" => "UV_register",                     
               "status1" => "Success",
               "dataClass"=> $Class->ShowClass(),
                "dataRegister" => $this->getSV()->showSV_class(), 
                "SL_SV"=> $Class->SL_SV_Class(),
            ]);
        }
        
    }
    
    function check_updateLHP(){
        $Class = $this->model('ClassModel');
        $Subject = $this->model('MonHocModel');
        $GV = $this->model('GiaoVienModel');
        if($Class->check_updateLHP() == true){  
            $this->view("master2",[
                "DV_view" => "AV_classManagement",                     
                "dataClass"=> $Class->ShowClass(),
                "dataSubject" => $Subject->showMonHoc(),
                "dataGV" => $GV->showGV_LHP()
            ]);
        }
        else{
            echo ("vào home chec ");
        }
    }
    function DeleteLHP(){
        $Class = $this->model('ClassModel');
       
        if($Class->DeleteLHP() == true){
            $this->view("master2",[
                "DV_view" => "AV_classManagement",                     
                "dataClass"=> $Class->ShowClass(),
                "SL_SV"=> $Class->SL_SV_Class(),
                "show" => "Quản lí lớp",
                "show1" => "1"
            ]);
        }
    }

    function DeleteSV(){
        $SV = $this->model('SinhVienModel');
       
        if($SV->deleteSV() == true){
            $this->view("master2",[
                "DV_view" => "AV_userManagement",                     
                "dataSinhVien"=> $SV->ShowSinhVien_K(),               
                "show" => "Xem sinh viên",
                "show1" => "2"
            ]);
        }
    }
    function DeleteGV(){
        $GV = $this->model('GiaoVienModel');
       
        if($GV->deleteGV() == true){
            $this->view("master2",[
                "DV_view" => "AV_userManagement",                     
                "dataGiaoVien"=> $GV->ShowGV(),               
                "show" => "Xem giáo viên",
                "show1" => "3"
            ]);
        }
    }

    function DeleteTT(){
        $QD = $this->model('QuiDinhModel');
        if($QD->deleteTT() == true){
            echo " vào xoá ";
        $this->view("master2",[
            "DV_view" => "AV_infor_other",
            "QD" => $QD->showTT(),
            "LH" => $QD->showLH(),
            "TB" => $QD->showTB(),
            "show" => "Xem thông tin",
            "show1" => "3"      
        ]);
        }
    }

   


    function showClassDetail(){
        $Class = $this->model('ClassModel');
       
      
            $this->view("master2",[
                "DV_view" => "Class_Detail",                     
                "ClassDetail"=> $Class->Class_Detail(),
                
            ]);
    }
    function EditPass2(){
        $SV = $this->model('SinhVienModel');
        $test = $SV->EditPass();
        $view = "";
        if($test == 0 ){
            $view = "GeneralView";
        }

        if($test == 1 || $test == 2 ){
            $view = "AdminView";
        }    
            $this->view("master2",[
                "DV_view" => $view,                     
                "status"=> "Success",
                
            ]);
        
        


       
    }

    function EditPass(){
        $this->view("master2",[
            "DV_view" => "edit_Pass",                     
            
            
        ]);
    }

    function insertGV(){
       
        $SV = $this->model('SinhVienModel');
        $GV = $this->model('GiaoVienModel');
        $address = $this->model('address');
        if($GV->InsertGV() == true){
            $this->view("master2",[
                "DV_view" => "AV_userManagement",
                "satus"=> " Đã thêm thành công",
                "dataSinhVien"=> $SV->ShowSinhVien(),
                "dataGiaoVien"=> $GV->ShowGV(),
                "province" => $address->showProvince(),
                "province2" => $address->showProvince(),
                "show" => "Thêm giáo viên",
                "show1" => "0"
            ]);
        }
    }


    function out(){
        if(isset($_SESSION['userName'])){ 
        unset($_SESSION['userName']);unset($_SESSION['theLoai']);}
        session_destroy();
        $this->view("master2",[
            "DV_view" =>"GeneralView"
        ]);
    }

    function ShowSinhVien(){
        $SV = $this->model('SinhVienModel');
        if($SV->ShowSinhVien() == true){
            $this->view("master2",[
                "DV_view" => "AV_userManagement",
                "satus"=> " Đã thêm thành công",
                "dataSinhVien"=> $SV->ShowSinhVien(),
                "show" => "Xem sinh viên",
                "show1" => "2"
            ]);
        }
    }
    function ShowSinhVien2(){
        $SV = $this->model('SinhVienModel');
        if($SV->ShowSinhVien() == true){
            $this->view("master2",[
                "DV_view" => "tracuu",
                
                "dataSinhVien"=> $SV->ShowSinhVien(),
                
            ]);
        }
    }

    function ShowGV(){
        $SV = $this->model('SinhVienModel');
        $GV = $this->model('GiaoVienModel');
        if($GV->ShowGV() == true){
            $this->view("master2",[
                "DV_view" => "AV_userManagement",
                "satus"=> " Đã thêm thành công",
                "dataSinhVien"=> $SV->ShowSinhVien(),
                "show" => "Xem giáo viên",
                "dataGiaoVien"=> $GV->ShowGV(),
                "show1" => "3"
                
            ]);
        }
    }

    function ShowGV2(){
        $SV = $this->model('SinhVienModel');
        $GV = $this->model('GiaoVienModel');
        if($GV->ShowGV() == true){
            $this->view("master2",[
                "DV_view" => "tracuu",
              
               
                
                "dataGiaoVien"=> $GV->ShowGV(),
               
                
            ]);
        }
    }

    
    function ShowSinhVien_K(){
        $SV = $this->model('SinhVienModel');     
        if($SV->ShowSinhVien() == true){
            $this->view("master2",[
                "dataSinhVien"=> $SV->ShowSinhVien_K(),
                "DV_view" => "AV_userManagement",
                "show" => "Xem sinh viên",
                "show1"=> '2'
            ]);
        }    
        
    }

    function Show_point_year(){

    }

    function UpdateSV(){
        $SV = $this->model('SinhVienModel');    
        $address =  $this->model(('address')); 
        if($SV->ShowSinhVien() == true){
            $this->view("master2",[
                "DV_view" => "UpdateSV",
                "dataSinhVien"=> $SV->ShowSinhVien(),
                     
                "province"  => $address->showProvince()     
            ]);
        }            
    }

    function UpdateGV(){
        $GV = $this->model('GiaoVienModel');    
        $address =  $this->model(('address')); 
        if($GV->ShowGV() == true){
            $this->view("master2",[
                "dataGiaoVien"=> $GV->ShowGV(),
                "DV_view" => "UpdateGV",     
                "province"  => $address->showProvince()     
            ]);
        }            
    }

    function Update_point_SV(){
        $SV = $this->model('SinhVienModel');     
        if($SV->Update_point_SV() == true){
            $this->view("master2",[             
                "DV_view" => "Class_Detail", 
                "ClassDetail"=> $this->getClass()->Class_Detail(),              
            ]);
        }  
    }

    function CheckUpdateSV(){
        $SV = $this->model('SinhVienModel');     
        if($SV->CheckUpdateSV() == true){
            $this->view("master2",[
                "dataSinhVien"=> $SV->ShowSinhVien(),
                "DV_view" => "AV_userManagement",               
            ]);
        }  
    }

    function CheckUpdateGV(){
        $GV = $this->model('GiaoVienModel');     
        if($GV->CheckUpdateGV() == true){
            $this->view("master2",[
                "dataGiaoVien"=> $GV->ShowGV(),
                "DV_view" => "AV_userManagement",  
                "show"=> "Xem giáo viên",
                "show1"=> "3"             
            ]);
        }  
    }

    function UV_register(){
        $Class = $this->model('ClassModel');     
        if (isset($_SESSION['theLoai']) && $_SESSION['theLoai'] ==3){
            $this->view("master2", [
                "DV_view" => "UV_register",
                "dataClass"=> $Class->ShowClass(),
                "dataRegister" => $this->getSV()->showSV_class(), 
                "SL_SV"=> $Class->SL_SV_Class(),

            ]);
        }   
        else{
            $this->view("login");
        } 
   
    }

    function tracuu(){
        $SV = $this->model('SinhVienModel');     
        if (isset($_SESSION['theLoai']) && $_SESSION['theLoai'] ==3){
            $this->view("master2", [
                "DV_view" => "tracuu",
             

            ]);
        }   
        else{
            $this->view("login");
        } 
   
    }

    function  SV_register(){
        
        $Class = $this->model('ClassModel');
         $SV = $this->getSV();
         $check = $this->getSV()->SV_register();
        if (!empty($check) && $check[0] == "full") {
            $this->view("master2", [
                "DV_view" => "UV_register",
                "dataClass"=> $Class->ShowClass(),
                "SL_SV"=>  $this->getClass()->SL_SV_Class(),
                "dataRegister" => $SV->showSV_class(),               
                "show" => "Trang đăng kí",             
                "show1" => "0",
                 "status" => $check
            ]);
        }
        else if (empty($check)){
            
            $this->view("master2", [
                "DV_view" => "UV_register",
                "dataClass"=> $Class->ShowClass(),
                "SL_SV"=>  $this->getClass()->SL_SV_Class(),
                "dataRegister" => $this->getSV()->showSV_class(),               
                "show" => "Trang đăng kí",             
                "show1" => "0"
            ]);
        }  
        else{
            
            $this->view("master2", [
                "DV_view" => "UV_register",
                "dataClass"=> $Class->ShowClass(),
                "SL_SV"=>  $this->getClass()->SL_SV_Class(),
                "dataRegister" => $SV->showSV_class(),               
                "show" => "Trang đăng kí",             
                "show1" => "0",
                 "status" => $check
            ]);
        } 
         
        
    }

    function UV_CTDT(){
        if (isset($_SESSION['theLoai']) && $_SESSION['theLoai'] == 3) {
            $this->view("master2", [
                "DV_view" => "UV_CTDT",
                "studentProgram" => $this->getSV()->showStudentProgram(),
                "showMonHoc" => $this->getSubject()->showMonHoc()
            ]);
        }
        else{
            $this->view("login");
        }
    }

    function profile(){
        $this->view("master2", [
            "DV_view" => "profile",
            "dataStudent" => $this->getSV()->ShowSV()
        ]);
    }

    function KQHT(){
        if (isset($_SESSION['theLoai']) && $_SESSION['theLoai'] == 3) {
            $this->view("master2", [
                "DV_view" => "KQHT",
                "point_sv" => $this->getSV()->showKQHT(),
                
            ]);
        }
        else{
            $this->view("login");
        }
    }

    function TKB(){
        $address = $this->model('address');
        $Class = $this->model('ClassModel');
        if (isset($_SESSION['theLoai']) && $_SESSION['theLoai'] == 3) {
            $this->view("master2", [
                "DV_view" => "TKB",
                "point_sv" => $this->getSV()->showKQHT(),
                "province" => $address->showProvince(),
                "NamHoc" => $Class->showNamHoc()
                
            ]);
        }
        else{
            $this->view("login");
        }
    }

    function district(){
        $address = $this->model('address');
        $address->showDistrict();
    }

    function district2(){
        $address = $this->model('address');
        $address->showDistrict();
    }

    function ward2(){
        $address = $this->model('address');
        $address->showWard();
    }

    function showTKB(){
        $address = $this->model('address');
        $address->showTKB();
    }

    function showHocPhi(){
        $address = $this->model('address');
        $address->showHocPhi();
    }


    function ward(){
        $address = $this->model('address');
        $address->showWard();
    }
    function lienHe()
    {
        $QD = $this->model('QuiDinhModel');
        $this->view("master2", [
            "DV_view" => "lienHe",
           "lienHe"=> $QD->showLH()

        ]);
    }
        
    function UV_hocphi()
    {
       
        $this->view("master2", [
            "DV_view" => "UV_hocphi",
            "NamHoc" => $this->getClass()->showNamHoc()

        ]);
    }

    

}
?>