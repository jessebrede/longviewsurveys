<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Lead</h1>
<?php
echo "test";
    echo $this->Form->edit();
    echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');
	echo $this->Form->input('zipcode');
	echo $this->Form->input('phone');
	echo $this->Form->input('dob');
	echo $this->Form->input('marital_status');
	echo $this->Form->input('email');
	echo $this->Form->input('signup_date');
	echo $this->Form->input('subid');
	echo $this->Form->input('status');
    echo $this->Form->input('ID', array('type' => 'hidden'));
	echo $this->Form->end('Save Lead');
?>