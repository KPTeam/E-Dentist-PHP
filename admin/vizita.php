
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
 else if($_SESSION['mof'] == 0)
 {
      $message = "Nuk keni akses.";
     echo "<script type='text/javascript'>alert('$message');</script>" ;
      header("refresh:0 url=../index.php");
 }
 ?>
<div class="container">
            <div class="row">
                <h3 >Vizitat</h3>
                <a href="CRUDv/create.php" class="btn btn-success ">Krijo</a>
            </div>
     <div class="row">
     
                   <div class="col-sm-3 col-md-3 pull-right ">
                       
                       <form class="navbar-form" role="search" action="CRUDv/search.php" method="POST">
                            
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Kerko" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
                   
        </div>
               
            </div>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Emri</th>
                      <th>Mbiemri</th>
                      <th>E-Mail</th>
                      <th>Diagnoza</th>
                      <th>Termini</th>
                      <th>Menaxhimi</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  <?php
                  $selektimi = "SELECT u.name, u.surname, u.email, t.id_termini, v.id_historiku, v.diagnose FROM user AS u INNER JOIN termini as T INNER JOIN vizita AS v ON t.id_users=u.user_id AND t.id_termini=v.termin_id ";
		$result = mysql_query($selektimi) or die ('invalid query:'. mysql_error());
                   
                       while($row = mysql_fetch_array($result))
		{
			
			list( $name, $surname,  $email, $termini_id, $vizita_id, $diagnoza )=$row;
			echo '  <tr>'; 
			echo '<td>'.$name.'</td>'; 
			echo '<td>'.$surname.'</td>'; 
		       echo '<td>'.$email.'</td>'; 
			
			echo '<td>'.$diagnoza.'</td>'; 
                        echo '<td><a class="btn btn-default" href="CRUD/read.php?id='.$termini_id.'" >Termini</a></td>'; 
                        echo '<td><a class="btn btn-default" href="CRUDv/read.php?id='.$vizita_id.'" >Lexo</a>';
                        echo ' ';
                        echo '<a class="btn btn-info   " href="CRUDv/update.php?id='.$vizita_id.'" >Ndrysho</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="CRUDv/delete.php?id='.$vizita_id.'" >Fshije</a></td>';
			echo '  </tr>'; 
		}
                  ?>
                  </tbody>
            </table>
        </div>
    </div> 
