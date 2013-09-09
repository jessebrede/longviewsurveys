<?php
// Include the jFormer PHP (use an good path in your code)
if(file_exists('./php/JFormer.php')) {
    require_once('./php/JFormer.php');
}
else if(file_exists('./../php/JFormer.php')) {
    require_once('./../php/JFormer.php');
}

// Create the form
$surveyComponentForm = new JFormer('surveyComponentForm', array(
    'title' => '',
    'submitButtonText' => '',
));

// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentSingleLineText('first1', 'First Name:'
	//, array('tip'=> '<p>Please enter your first name.</p>',
   	//)
	),
));

$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentSingleLineText('last1', 'Last Name:'
	
	//, 
	//array('tip'=> '<p>Please enter your last name.</p>',
    //)
	),
));


// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentSingleLineText('zipcode1', 'ZipCode:'
	//, 
	//array('tip'=> '<p>Please enter your zipcode.</p>',
    //)
	
	),
));



// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentSingleLineText('phone1', 'Phone Number:'
	//, 
	//array(
    //    'tip' => '<p>Please enter your phone number.</p>',
    //)
	),
));

	$year = array();
    for($i = date('Y'); $i >= date('Y', strtotime('-100 years')); $i--){
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
    new JFormComponentDropDown('month1', 'Date of Birth:',
        $month
    ),
));  


// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentDropDown('day1', '&nbsp;',
        $day
    ),
));

// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentDropDown('year1', '&nbsp;',
        $year
    ),
));



// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentMultipleChoice('maritialstatus1', 'Maritial Status:',
        array(
            array('label' => 'Single', 'value' => 'single'),
            array('label' => 'Married', 'value' => 'married'),
            array('label' => 'Cohabitating', 'value' => 'cohabitating'),
        ),
		array(
            'multipleChoiceType' => 'radio',
        //),
        //array(
        //    'tip' => '<p>Pleaes tell us your maritial status.</p>',
        )),
		
));

// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentSingleLineText('email1', 'Email Address:'
	
	//, array(    'tip' => '<p>Please enter your email address.</p>',)
	),
));



// Set the function for a successful form submission
function onSubmit($formValues) {
    // Return a simple debug response
	$response['successPageHtml'] = '
            <h1>You have been entered to win.</h1>
        ';
	return $response;
    //return array('failureNoticeHtml' => json_encode($formValues));
}


// Process any request to the form
$surveyComponentForm->processRequest();
?>