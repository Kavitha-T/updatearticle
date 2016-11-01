<!DOCTYPE HTML>
<html>

<head>
<title>SITE SETUP </title>
<link rel="stylesheet" type="text/css" href="style_dn_controller_tb.css">
	<script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

<script type="text/javascript">
</script>

</head>
<?php
$errcname = "";
if($_SERVER['REQUEST_METHOD']=='POST')
{
#server
	if (empty($_POST["txtserver"])) 
  {
    $errserver= "ServerName Required";
  } 
  else 
  {
    $server = $_POST['txtserver'];
	 }

#MySQL username
  if (empty($_POST["txtdbuname"])) 
  {
    $errdbuname= "MySQL Username Required";
  } 
  else 
  {
    $dbuname = $_POST['txtdbuname'];
	
  }
#MySQL password
  if (empty($_POST["txtdbpwd"])) 
  {
    $errdbpwd= "MySQL Password Required";
  } 
  else 
  {
    $dbpwd = $_POST['txtdbpwd'];
	
  }

#port
  if (empty($_POST["txtport"])) 
  {
    $errport= "Port Number Required";
  } 
  else 
  {
    $port = $_POST['txtport'];
	
  }

#sitename-
  if (empty($_POST["txtsitename"])) 
  {
    $errsitename= "Site Name Required";
  } 
  else 
  {
    $dbname = $_POST['txtsitename'];
	
  }
  
#clientname
  if (empty($_POST["txtclientname"])) 
  {
    $errcname= "ClientName Required";
  } 
  else 
  {
    $clientname = $_POST['txtclientname'];
  }

#articlemeta
 if(isset($_FILES['articlemeta'])){
      $errors= array();
      $image_name = $_FILES['articlemeta']['name'];
      $image_size =$_FILES['articlemeta']['size'];
      $image_tmp =$_FILES['articlemeta']['tmp_name'];
      $image_type=$_FILES['articlemeta']['type'];
      $image_ext=strtolower(end(explode('.',$_FILES['articlemeta']['name'])));
      $fileMeta = file_get_contents($_FILES['articlemeta']['tmp_name']);
      $expensions= array("jpeg","jpg","png");
      $filePath = realpath($_FILES['articlemeta']['tmp_name']);
	   
	   $target_Path = '/images/'.$image_name;
	    move_uploaded_file($_FILES['articlemeta']['tmp_name'],$target_Path);
      
     
      
   }
	
#articlecontent
 if(isset($_FILES['articlecontent'])){
      $errors= array();
      $content_name = $_FILES['articlecontent']['name'];
      $content_size =$_FILES['articlecontent']['size'];
      $content_tmp =$_FILES['articlecontent']['tmp_name'];
      $content_type=$_FILES['articlecontent']['type'];
      $content_ext=strtolower(end(explode('.',$_FILES['articlecontent']['name'])));
      $fileContent = file_get_contents($_FILES['articlecontent']['tmp_name']);
      $expensions_content= array("jpeg","jpg","png");
      $filePath_content = realpath($_FILES['articlecontent']['tmp_name']);
	   
	   $target_Path_content = '/images/'.$image_name;
	    move_uploaded_file($_FILES['articlecontent']['tmp_name'],$target_Path_content);
      
      
      
   }
else{

}
#Publication Path
if (empty($_POST["txtPubId"])) 
  {
  $errpublid ="Publication ID Required";
  }

else 
  {
  $publid = $_POST["txtPubId"];
  }

#journalname
if (empty($_POST["txtarticleId"])) 
  {
    $errarticleid= "ArticleId Required";
  } 
  else 
  {
  $art_contentid = $_POST['txtarticleId'];
  }
include("articles_update_conn.php");
}
?>

<body>
<div id='img'><img src="exeter_premedia_services.png" alt="Exeter Premedia Services" width="60%" style="display: block; margin: 40px auto;">
</div>
<div> </div>
<div class = "div1" style ="overflow-x:auto";>
<form action="" method="post" style = "margin-left:-90px"  enctype="multipart/form-data">
<p>  </p>

<table id ="table1" class = "table" cellspacing="8" cellpadding="8">


<tr>
<td><label class="label" style="width:25px"> Server </label></td>
<td><input type = "text" style="width:155px" class="text" name="txtserver" placeholder="Enter Server name"/>
<span style="color:red">* <?php echo $errserver; ?></span></td>
</tr>

<tr>
<td><label class="label"> Port </label></td>
<td><input type = "text"   style="width:155px"class="text" name="txtport" placeholder="Enter Port Number"/>
<span style="color:red">* <?php echo $errport; ?></span></td>
</tr>

<tr>
<td><label class="label">MySQL Username </label></td>
<td><input type = "text"  style="width:155px" class="text" name="txtdbuname" placeholder="Enter your MySQL Username"/>
<span style="color:red">* <?php echo $errdbuname; ?></span></td>
</tr>

<tr>
<td><label class="label">MySQL Password </label></td>
<td><input type = "password"  style="width:155px" class="text" name="txtdbpwd" placeholder="Enter your MySQL Password"/>
<span style="color:red">* <?php echo $errdbpwd; ?></span></td>
</tr>

<tr>
<td><label class="label">Site Name </label></td>
<td><input type = "text"  style="width:155px" class="text" name="txtsitename" placeholder="Enter the Site Name"/>
<span style="color:red">* <?php echo $errsitename; ?></span></td>
</tr>

<tr>
<td><label class="label">Publication ID</label></td>
<td><input type = "text" style="width:155px" class="text" name="txtPubId" placeholder="Enter the Client Name"/>
<span style="color:red">* <?php echo $errpublid; ?></span></td>
</tr>


<tr>
<div id="journal">
<td><label class="label">Article ID</label></td>
<td><input type = "text"  style="width:155px" class="text" name="txtarticleId" placeholder="Enter the ArticleName"/>
<span style="color:red">* <?php echo $errarticleid; ?></span>
</td>
	<tr>
<td><label class="label">Metadata </label></td>
<td>
	<input type="file" name="articlemeta" />
	 
	<span style="color:red">
</td>
<td><label class="label">Article Content </label>
<input type="file" name="articlecontent" />
</td>

	</div>
	</tr>
	
	</table>
<!--
<tr>
<td><label class="label">Article Name </label></td>
<td><input type = "text" class="text" name="txtarticlename" placeholder="Enter the Article Name"/>
<span style="color:red">* <?php echo $errarticlename; ?></span></td>
</tr>
!-->

	<table style="margin-top:-45px;margin-left:65px;" cellspacing="42px">
<tr>
	<td><input type ="submit" value="Submit" name="submit" class="button" /></td>
<td><input type ="reset" value="Cancel" name="cancel" class="button" /></td>
</tr>

</table>

</form>

</div>

<?php

?>
</body>
</html>