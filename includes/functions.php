<?php


function database_conn(){
	// Create connection
	$con=mysqli_connect("localhost","cbounds_jesse","Aenima99","cbounds_cake");

	// Check connection
	if (mysqli_connect_errno($con))
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	return($con);
}

function insert_form_data($form_data){
	$con = database_conn();
	
	$insert_sql = "insert into leads (first_name, last_name, zipcode, phone, dob, marital_status, email, signup_date, subid, status) values ('".$form_data->first."', '".$form_data->last."', '".$form_data->zipcode."', '".$form_data->phone."', '".$form_data->month."-".$form_data->day."-".$form_data->year."', '".$form_data->maritialstatus."', '".$form_data->email."', '".$form_data->date."', '".$form_data->subid."',  'New')";
	
	
	if (!mysqli_query($con, $insert_sql))
  	{
  		return($mysqli->error);
  	}else{
		mysqli_close($con);
		return('New Row Added');
	}
	
	
	//mysqli_query($con, $insert_sql);
	     
	return($insert_sql); 
}

?>
