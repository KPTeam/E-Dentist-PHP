
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['logged_in']))
 {
     $message = "Nuk keni akses.";
     echo "<script type='text/javascript'>alert('$message');</script>" ;
      header("refresh:0 url=../index.php");
 }
 ?>
<div class="container">
            <div class="row">
                <h3 >Vizitat</h3>   
            </div>
                <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Emri</th>
                      <th>Mbiemri</th>
                      <th>E-Mail</th>
                      <th>Verejtje</th>
                      <th>Termini</th>
                      <th>Menaxhimi</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  <?php
                  $selektimi = "SELECT u.name, u.surname, u.email, t.id_termini, v.id_historiku, v.verejtje FROM user AS u INNER JOIN termini as t INNER JOIN vizita AS v ON t.id_users=u.user_id AND t.id_termini=v.termin_id WHERE u.username='".$_SESSION['username']."'";
		$result = mysql_query($selektimi) or die ('invalid query:'. mysql_error());
                   
                       while($row = mysql_fetch_array($result))
		{
			
			list( $name, $surname,  $email, $id_termini, $vizita_id, $verejtje )=$row;
			echo '  <tr>'; 
			echo '<td>'.$name.'</td>'; 
			echo '<td>'.$surname.'</td>'; 
		       echo '<td>'.$email.'</td>'; 
			
			echo '<td>'.$verejtje.'</td>'; 
                        echo '<td><a class="btn btn-default" href="CRUD/read.php?id='.$id_termini.'" ><span class="glyphicon glyphicon-calendar">&thinsp;</span>Termini</a></td>'; 
                        echo '<td><a class="btn btn-default" href="inc/historiku_read.php?id='.$vizita_id.'" ><span class="glyphicon glyphicon-th-list">&thinsp;</span>Lexo</a>';
                        echo ' ';
			echo '  </tr>'; 
		}
                  ?>
                  </tbody>
            </table>
        </div>
</div>
    </div> 

