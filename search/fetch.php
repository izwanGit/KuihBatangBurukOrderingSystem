<?php
//fetch.php
include("dbconn.php");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($dbconn, $_POST["query"]);
 $query = "
  SELECT * FROM student 
  WHERE studentnumber LIKE '%".$search."%'
  OR studentname LIKE '%".$search."%' 
  OR studentusername LIKE '%".$search."%' 
 ";
}else{
 $query = "SELECT * FROM student ORDER BY studentnumber";
 $query = ""; //comment this line to list students upon page loading
}
if ($query!=""){
  $result = mysqli_query($dbconn, $query);
  if(mysqli_num_rows($result) > 0){
       $output .= '<div class="table-responsive">
       <table class="table table bordered"><tr>	
      <th>ID</th>
      <th>Student Number</th>
      <th>Name</th>
      <th>Password</th>
      </tr>';
 while($row = mysqli_fetch_array($result)){
        $output .= '
	<tr>
	<td>'.$row["studentid"].'</td>
	<td>'.$row["studentnumber"].'</td>
	<td>'.$row["studentname"].'</td>
	<td>'.$row["studentpassword"].'</td>
	</tr>
	';
    }
    echo $output;
 }else{
    echo 'Data Not Found';
 }
}else{
  echo 'Data Not Found';
}

?>
