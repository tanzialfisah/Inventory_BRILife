

<?php


    $serverName="NBCNITD666\MSSQLSERVER2008";


    $uid = "sa";


    $pwd = "sa";


    $connectionInfo = array( "UID"=>$uid,


                             "PWD"=>$pwd,


                             "Database"=>"DB_Inventory",


                             "CharacterSet"=>"UTF-8");


     


    $conn = sqlsrv_connect( $serverName, $connectionInfo);



    if($conn){


        echo "Koneksi Berhasil";


    }else{


        echo "koneksi gagal";


    }


?>

