<!DOCTYPE html>
<html>

<?php
session_start();
//Mysql connection 
$dbcon = mysqli_connect($server,$dbuname,$dbpwd,$dbname);

if(!$dbcon)
{
  echo "Connection Error:" . mysqli_connect_error();
}
else
{

#echo "Connected to MySQL Successfully". $dbname;

$sql3 = "SELECT f_attribute FROM $dbname.t_articles WHERE f_id = $art_contentid";
$results=mysqli_query($dbcon,$sql3);
while($row=mysqli_fetch_array($results,MYSQLI_ASSOC))
{
	$attribute =  $row['f_attribute'];
if($attribute =="type=\"content\"")
  {
 


#echo"Publication ID is".	$publid;

#echo "Article Content ID is".$art_contentid;
$articlecontent = mysqli_real_escape_string($dbcon,$fileContent);

#print "content after ".$notes;

#query to update content
if (!empty($articlecontent))
{
$sql = "UPDATE $dbname.t_articles SET f_text = '$articlecontent' WHERE f_id = $art_contentid"; 

if(mysqli_query($dbcon,$sql))
  {

echo "Content Record updated successfully.";
  }
else
  {
	echo "Error in updating Meta data". $sql ."<br>" .mysqli_error($dbcon);
  }
}
#query to update meta content
$metadata = mysqli_real_escape_string($dbcon,$fileMeta);

#print "Meta Content";
#print $metadata;
if(!empty($metadata))
   {
$sql2 = "UPDATE $dbname.t_articles SET f_text = '$metadata' WHERE f_children = $art_contentid"; 

if(mysqli_query($dbcon,$sql2))
   {
	
	echo "Meta Record updated successfully.";
   }
else
   {
	echo "Error in updating Content data". $sql2 ."<br>" .mysqli_error($dbcon);
   }

 }
else
  {
echo "entered id doest not belong to content. The attribute is ". $attribute ;

  }

}}}