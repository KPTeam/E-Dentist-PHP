<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['logged_in']))
 {
     $message = "Nuk keni akses.";
     echo "<script type='text/javascript'>alert('$message');</script>" ;
      header("refresh:0 url=../../?faqe=home");
 }

     
 else{ 
?> 
<style>

    label{float:left;} 
</style>

<div class="span10 offset1">
                    <div class="row">
                        <h3>Krijimi i  Terminit</h3>
                    </div>
             
    <div class="col-sm-6">
        
    <form id="termin_form" method="POST" action = "CRUD/termin_insert.php" onsubmit="return validateForm();" >
        
      <div class="form-group" >
    
      <input id="name" type="hidden" class="form-control" name="name" value="<?php echo $_SESSION['name'] ?>" placeholder="Shkruaj Emrin">
      <span id="name_validation" class="error" hidden></span>
    </div>
    <div class="form-group">
     
      <input id="surname" type="hidden" class="form-control" name="surname" value=" <?php echo $_SESSION['surname'] ?>" placeholder="Shkruaj Mbiemrin">
      <span id="surname_validation" class="error" hidden></span>
      
    </div>
      <div class="form-group">
      <label class="required" for="username">Pacienti:</label>
    <select value='' class='form-control' id='username' name='username' readonly>
   
        <option value="<?php echo $_SESSION['username'] ?>"> <?php echo $_SESSION['name']; ?> <?php echo $_SESSION['surname'];?> (<?php echo $_SESSION['username']; ?>)</option>"; 
   </select>
       <span id="username_validation" class="error"></span>
     
    </div>
    <div class="form-group">
      <label class="required">Ora:</label>
        <select class="form-control" id="time" name="time">
    <option value="08:00:00">Termini ne ora 8</option>
    <option value="09:00:00">Termini ne ora 9</option>
    <option value="10:00:00">Termini ne ora 10</option>
     <option value="11:00:00">Termini ne ora 11</option>
      <option value="12:00:00">Termini ne ora 12</option>
       <option value="13:00:00">Termini ne ora 13</option>
        <option value="14:00:00">Termini ne ora 14</option>
         <option value="15:00:00">Termini ne ora 15</option>
          <option value="16:00:00">Termini ne ora 16</option>
           <option value="17:00:00">Termini ne ora 17</option>
           </select>
     
      
    </div>
      <div class="form-group">
      <label class="required"  for="date">Data:</label>
       <input type="text"  id="datepicker" name="datepicker" readonly class="form-control">
       <span id="date_validation" class="error"></span>
     
      
    </div>
    <button type="submit" value="Submit" form ="termin_form"class="btn btn-success"><span class="glyphicon glyphicon-ok">&thinsp;</span>Krijo</button>
     <button type="reset" value="Cancel" form ="termin_form" class="btn btn-warning" ><span class="glyphicon glyphicon-remove">&thinsp;</span>Fshije</button>
    <a class="btn btn-default" href="?faqe=terminet"><span class="glyphicon glyphicon-chevron-left">&thinsp;</span>Kthehu</a>
  </form>
        
                </div>
 <div class="col-sm-6">
     <span><br></span>
     <span><br></span>
     <span><br></span>
      <span><br></span> 
          <ul class="list-group">
             
  <li class="list-group-item"> <p>Per shkak se orari jone i punes eshte nga Ora 08:00-18:00 mund te caktohen vetem 10 termine qe zgjasin nga nje ore.</p> </li>
  <li class="list-group-item"> <p>Zgjedhja e dates eshte e limituar pasi qe te mos kete termine te panevojshme ne muajt e ardhshem. Po ashtu nuk mund te zgjidhet data e sotshme.</p></li>  
</ul>
       
                </div>
                </div>
</div>

 <?php }
               