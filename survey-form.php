<?php
// Include the jFormer PHP (use an good path in your code)
if(file_exists('./php/JFormer.php')) {
    require_once('./php/JFormer.php');
}
else if(file_exists('./../php/JFormer.php')) {
    require_once('./../php/JFormer.php');
}

include('includes/functions.php');

// Create the form
$surveyComponentForm = new JFormer('surveyComponentForm', array(
    'title' => '',
    'submitButtonText' => '',
));

// Add components to the form
$surveyComponentForm->addJFormComponentArray(

	array(
	
		new JFormComponentSingleLineText('first', 'First Name:'
	//, array('tip'=> '<p>Please enter your first name.</p>',
   	//)
	 , array('validationOptions' => array('required'))
	 
	 ))
);

$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentSingleLineText('last', 'Last Name:'
	
	//, 
	//array('tip'=> '<p>Please enter your last name.</p>',
    //)
	 , array('validationOptions' => array('required'))
	 
	 ))
);


// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentSingleLineText('zipcode', 'ZipCode:'
	//, 
	//array('tip'=> '<p>Please enter your zipcode.</p>',
    //)
	
 , array('validationOptions' => array('required'))
	 
	 ))
);


// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentSingleLineText('phone', 'Phone Number:'
	//, 
	//array(
    //    'tip' => '<p>Please enter your phone number.</p>',
    //)
 , array('validationOptions' => array('required'))
	 
	 ))
);
	$year = array();
    for($i = date('Y', strtotime('-18 years')); $i >= date('Y', strtotime('-100 years')); $i--){
          $year[] = array('label' =>  $i, 'value' => $i);
    } 

	$month = array();
   for($i = 1; $i <= 12; $i++){
   		 $i = str_pad($i, 2, 0, STR_PAD_LEFT);
       $month[] = array('label' =>  $i, 'value' => $i);
          
   }
    
	$day = array();
	for($i = 1; $i <= 31; $i++){
    	$i = str_pad($i, 2, 0, STR_PAD_LEFT);
        $day[] = array('label' =>  $i, 'value' => $i);
    }
	
	
 // Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentDropDown('month', 'Date of Birth:',
        $month
    ),
));  


// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentDropDown('day', '&nbsp;',
        $day
    ),
));

// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentDropDown('year', '&nbsp;',
        $year
    ),
));



// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentMultipleChoice(
		'maritialstatus', 'Maritial Status:',
        array(
            array('label' => 'Single', 'value' => 'single'),
            array('label' => 'Married', 'value' => 'married'),
            array('label' => 'Cohabitating', 'value' => 'cohabitating'),
        ),
		array('multipleChoiceType' => 'radio', 'validationOptions' => array('required'))		
		
        //),
        //array(
        //    'tip' => '<p>Pleaes tell us your maritial status.</p>',
	))
);
		


// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentSingleLineText('email', 'Email Address:'
	
, array('validationOptions' => array('required'))
	 
	 ))
);

// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentMultipleChoice('terms', '',
        array(
            array('label' => 'I have read the <a href="#" onClick="open_win(\'http://longviewsurveys.com/terms-and-conditions.html\')">terms and conditions</a> 
and details of participation', 'value' => 'yes')
        )
        //),
        //array(
        //    'tip' => '<p>Pleaes tell us your maritial status.</p>',
       , array('validationOptions' => array('required'))
	 
	 ))
);

// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentHidden('subid', $_GET['subid']),
));

$date = date('Y-m-d H:i:s');
// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentHidden('date', $date),
));


// Set the function for a successful form submission
function onSubmit($formValues) {
	
	//
	
	//$text = var_dump($formValues);
	if(!empty($formValues->first)) {
       $name = $formValues->first;
    }else{
		//return( json_encode(array('failureNoticeHtml' => 'First Name can\'t be blank')));
	}
		
	$insert_query = insert_form_data($formValues);
	      
	
    // Return a simple debug response
	$response['successPageHtml'] = '<h1>Thanks '.$name.'!<br>You have been entered to win.</h1>';
	return $response;
    
	//return array('failureNoticeHtml' => json_encode($formValues));
}


// Process any request to the form
$surveyComponentForm->processRequest();
?>