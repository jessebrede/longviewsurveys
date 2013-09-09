<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>LongView Surveys</title>
	<meta name="description" content="Win a John Deer Mower">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" type="text/css" href="stylesheets/jformer.css" ></link>


	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <script src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="/js/jformer.js" ></script>

<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/jformer.php');

    // Create the form , This is the object which wraps and handles the form
    // the ID of the form is passed as the first argument this will be used in DOM to help identify the form.
    // you can pass an options array as a second argument, but we'll go over that later.
    $demonstrationForm = new JFormer('demonstrationForm');

    // Create the form page
    // this object is a page on the form, it holds the sections
    // you can have as many pages as you want.
    // again, the ID is passed first, and an option array is passed second,
    $demonstrationPage = new JFormPage($demonstrationForm->id.'Page', array(
        // Here we set the title of the Page and this can be straight text or HTML
        'title' => '<h3>Address Component Examples</h3>',
    ));

    // Create the form section
    // again, the Id is passed as the first argument with an optional array of options
    // sections holds all of your inputs, seperating inputs into sections allow for better organization.
    // there can be multiple sections on a page.
    $demonstrationSection = new JFormSection($demonstrationForm->id.'Section');

    // Add components to the section
    $demonstrationSection->addJFormComponentArray(array(
        // this is a single line text component, Id passed as the first argument, with the label passed as the second
        // take a look at the options array passed as the third argument, options can be added in any order
        new JFormComponentSingleLineText('text1', 'Say Hello:', array(
            // this description is displayed under the field to give extra information
            'description' => '<p>I am a description for a component, and can be used to give further instruction as needed. Put in your first name and click submit.</p>',
            // these are all the validations this field needs to pass, you can have one, none or as many as you need!
            'validationOptions' => array('required', 'alpha'),
            // this is the tipe that shows up when this field has focus, it is great if you need to give hints or helpful information, but dont' need it always showing
            'tip' => '<p>Hey look, I am a tip, and I can give helpful advice.</p><p>Please don\'t leave me blank, also I am set to only accept letters. try typing in a number and see what happens.</p>',
        )),
    ));

    // Add the section to the page (place it inside)
    $demonstrationPage->addJFormSection($demonstrationSection);

    // Add the page to the form (place it inside)
    $demonstrationForm->addJFormPage($demonstrationPage);


// Set the function for a successful form submission
// so if all validation passes on all form components, the data gets sent server side to be handled by this function, in this function is where you would want to put all your handling,
// whether that is talking to a database, checking of login credentials, here is the place you do with your data that gets submitted.
function onSubmit($formValues) {
    // this what you want to do if everything is all great with your server side validation and you finish everything server side.
    // you can execute javascript, for success or failure, display a page, or even errors.
    $response = array('successPageHtml' => '<h2>Hello World!</h2><p>Thanks for trying out the demonstration form '.$formValues->demonstrationFormPage->demonstrationFormSection->text1.'.</p><p>Check out our <a href="/demos/">Demos Page</a> to see some more advanced demonstrations');

    return $response;
}

// Process any request to the form
$demonstrationForm->processRequest();
?>      	
       	</div>
	</div><!-- container -->    
	

<!-- End Document
================================================== -->
</body>
</html>