<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Lead');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
//echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Lead');
?>