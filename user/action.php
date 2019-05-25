<?php
    session_start();                        
        $koneksi = new mysqli('localhost', 'root', '','dbpraktikum');

    $username=$_POST['username'];           
    $password=$_POST['password'];           

    $query=mysqli_query($koneksi, "select * from tbl_mahasiswa where npm='$username' and pass_mhs='$password'");    
    if($query==TRUE){                             
        $_SESSION['username']=$username;      
        header("location:index.php");         
    }else{                                   
        echo "gagal login";
    }

?>