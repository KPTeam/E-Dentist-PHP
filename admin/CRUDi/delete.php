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
     $fullpath=null;
$path = null;
    if ( !empty($_GET['path'])) {
        $path = $_REQUEST['path'];
    }
  
    if ( null==$path ) {
       $message = "Te dhenat nuk u gjeten.";
                        echo "<script type='text/javascript'>alert('$message');</script>" ;
        
        header("refresh:0 url=../index.php");
    }
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="edentist.ico">
	<link rel="stylesheet" type="text/css" href="../../css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="../../css/hover.css">  
 

    <title>E-Dentist</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
      <script type="text/javascript" src="../../js/jquery.jSlider.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/script.js"></script>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
    </head>
    <body>
    <div class = "navbar navbar-inverse navbar-fixed-top" id="header" >
      <div class = "container">
       <div class="navbar-header">
           <a class="navbar-brand" href= "../../index.php?faqe=home" id="logo"></a> 
       </div>
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
			
                       
		   <div class="collapse navbar-collapse" id="navbar-collapse">
                       
		   <ul class ="nav navbar-nav">
			
                       <li><a href="../../index.php" class="hvr-underline-from-left" id="links"                 
                                 ><span      class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="../?admin=terminet" class="hvr-underline-from-left" id="links">TERMINI</a></li>
                    <li><a href="../?admin=vizita" class="hvr-underline-from-left"id="links">VIZITA </a></li>
                     <li><a href="../?admin=diagnoza" class="hvr-underline-from-left"id="links">DIAGNOZA </a></li>
                    <li><a href="../?admin=userat" class="hvr-underline-from-left" id="links">PERDORUESI</a></li>
                     <li><a href="../?admin=keshillat" class="hvr-underline-from-left"id="links">KESHILLA </a></li>
                    <li><a href="../?admin=sherbimet" class="hvr-underline-from-left" id="links">SHERBIMI</a></li>
                 </ul>
             </div>
        </div>
    </div>
<div class ="container" id="content" align="center">
               
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Fshirja e Imazhit</h3>
                       
                    </div>
                         <table class="table table-striped table-bordered">
         <thead>
             
        </thead>
        <tbody>
             <?php
           $directory = "../../images/";
            $texts = glob($directory . $path);                      
foreach($texts as $text)
{
    $name = ( explode("/", $text));
    echo '<tr>';
     echo '<td>Titulli</td>';
    echo '<td>'.$name[5].'</td>';
     echo '</tr>';
       echo '<tr>';
     echo '<td>Folderi</td>';
    echo '<td>'.$name[2].'</td>';
        echo '</tr>';
          echo '<tr>';
     echo '<td>Foto</td>';
    echo '<td><img class="img-responsive" src="'.$text.'" ></td>';
          echo '</tr>';
      $fullpath = $text;
    
}                 
                ?>
          
        </tbody>
    </table>
                     <form class="form-horizontal" action="image_delete.php" method="post">
                      <input type="hidden" name="path" value="<?php echo $fullpath;?>"/>
                        <div class="panel panel-danger">
      <div class="panel-heading">A jeni i sigurt qe deshiron te shlyeni Imazhin ?</div>
      <div class="panel-body">
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-ok">&thinsp;</span>Po</button>
                          <a class="btn btn-default" href="../?admin=imazhet"><span class="glyphicon glyphicon-remove">&thinsp;</span>Jo</a>
                        </div>
                      </div>
                    </form>
                </div>
                 
</div> <!-- /container -->
 
  </body>
 <?php }