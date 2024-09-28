 <?php
     $user = 'root';
     $host = 'localhost';
     $con = mysqli_connect($host,$user,"");
     $qry = 'create database if not exists  reg_db';
     //variables 
     if(isset($_POST['te']))
        $te  = $_POST['te'];
     if(isset($_POST['te']))
        $ne  = $_POST['ne'];
    $NAME = $_POST['Name'];
    $EMAIL = $_POST['Email']; 
    $PHN =   $_POST['PHONE'] ;
    $WHN = $_POST['WHN'];
    $CN = $_POST['CN'];
    $DG = $_POST['DG'];
    $BR = $_POST['BR'];
    $YR = $_POST['Year'];
    $Food  = $_POST['fs'];
    echo "$NAME";
    $Tech = "";
    $Non_Tech = "";
    if(!empty($te))
    {
     for($i=0;$i<count($te);$i++)
     {
        $Tech .= strval($i+1).".".$te[$i]."\n";
     }
    }
    if(!empty($ne))
    {
     for($i=0;$i<count($ne);$i++)
     {
        $Non_Tech .= strval($i+1).".".$ne[$i]."\n";
     }
    }
    echo "$Tech<br>";
    echo "$Non_Tech<br>";
    if(!$con)
         {
            die('conection failed'.mysqli_connect_error());
        }
    else
    {
         if(mysqli_query($con,$qry))
         {
                echo "Db Created successfully";
                mysqli_select_db($con,"reg_db");
                $SNO =  mysqli_num_rows(mysqli_query($con,"select * from reg_detail"))+1;
                echo $SNO;
                $qry = "CREATE TABLE IF NOT EXISTS reg_db.reg_detail (SNO INT NOT NULL,Name VARCHAR(200) NOT NULL , Email VARCHAR(200) NOT NULL , Phone_Number BIGINT(20) NOT NULL , WhatsApp_Number BIGINT(20) NOT NULL , College_Name VARCHAR(200) NOT NULL , Degree VARCHAR(200) NOT NULL , Branch VARCHAR(200) NOT NULL , Year VARCHAR(200) NOT NULL , Technical_Events VARCHAR(200) NOT NULL , Non_Technial_Events VARCHAR(200) NOT NULL , Food_Type VARCHAR(200) NOT NULL , PRIMARY KEY (Email, Phone_Number, WhatsApp_Number)) ENGINE = InnoDB;";
                mysqli_query($con,$qry);
        }
        $ins_qry = "INSERT INTO reg_detail (SNO, Name, Email, Phone_Number, WhatsApp_Number, College_Name, Degree, Branch, Year, Technical_Events, Non_Technial_Events, Food_Type) VALUES ('$SNO', '$NAME','$EMAIL', '$PHN', '$WHN', '$CN', '$DG', '$BR', '$YR', '$Tech', '$Non_Tech', '$Food');";
        if(mysqli_query($con,$ins_qry))
            echo "Registerd Successfully";
    }
?>
