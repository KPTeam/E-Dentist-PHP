<?php
       include('../../inc/db_con.php');
       if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['logged_in']))
 {
     $message = "Nuk keni akses.";
     echo "<script type='text/javascript'>alert('$message');</script>" ;
      header("refresh:0 url=../index.php");
 }
 else if($_SESSION['mof'] == 0)
 {
      $message = "Nuk keni akses.";
     echo "<script type='text/javascript'>alert('$message');</script>" ;
      header("refresh:0 url=../index.php");
 }
     
 else{


		$titulli = $_POST['titulli'];
                $permbajtja = $_POST['permbajtja'];
                $imazhi = $_POST['foto'];
        
          $sql_insert = "INSERT INTO keshillat (titulli, permbajtja, imazhi)
				VALUE ('$titulli','$permbajtja','$imazhi') ";
		
		$query=mysql_query($sql_insert);
		
		if($query)
		{
			$message = "Te dhenat u ruajten me sukses. Shtyp OK per tu kthyer";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        header("refresh: 0; url=../?admin=keshillat");
                         
                        
			
			
			
		}
		else{
			
		$message = "Te dhenat nuk u ruajten me sukses. Vertetoni nese personi ekziston";
                        echo "<script type='text/javascript'>alert('$message');</script>" or die ('invalid query:'. mysql_error());
			header( "refresh: 0; url=create.php" );
		}
 
        }         
             
		


	