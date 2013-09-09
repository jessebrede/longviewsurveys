<?php
// Include the jFormer PHP (use an good path in your code)
if(file_exists('../php/JFormer.php')) {
    require_once('../php/JFormer.php');
}
else if(file_exists('../../php/JFormer.php')) {
    require_once('../../php/JFormer.php');
}

// Create the form
$surveyComponentForm = new JFormer('surveyComponentForm', array(
    'title' => '<h1>Name Component</h1>',
    'submitButtonText' => 'Test',
));

// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentName('name1', 'Name:', array(
        'tip' => '<p>This is a tip on a name component.</p>',
    )),
));


// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentSingleLineText('zipcode1', 'ZipCode:', array('Please enter your zipcode.</p>',
    )),
));



// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentSingleLineText('phone1', 'Phone Number:', array(
        'tip' => '<p>Please enter your phone number.</p>',
    )),
));


// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentMultipleChoice('maritialstatus1', 'Maritial Status:',
        array(
            array('label' => 'Single', 'value' => 'single'),
            array('label' => 'Married', 'value' => 'married', 'checked' => true),
            array('label' => 'Cohabitating', 'value' => 'cohabitating'),
        ),
        array(
            'tip' => '<p>Pleaes tell us your maritial status.</p>',
        )
    )
));

// Add components to the form
$surveyComponentForm->addJFormComponentArray(array(
    new JFormComponentHidden('subid1', ''),
));

// Set the function for a successful form submission
function onSubmit($formValues) {
    // Return a simple debug response
	$response['successPageHtml'] = '
            <h1>Thanks for Contacting Us</h1>
            <p>Your message has been successfully sent.</p>
        ';
	return $response;
    //return array('failureNoticeHtml' => json_encode($formValues));
}



// Process any request to the form
$multipleChoiceComponentForm->processRequest();




// Set the function for a successful form submission
function onSubmit($formValues) {
    // Return a simple debug response
    return array('failureNoticeHtml' => json_encode($formValues));
}

// Process any request to the form
$nameComponentForm->processRequest();
?>