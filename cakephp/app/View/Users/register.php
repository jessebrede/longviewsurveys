<?php
echo $this->Form->create(array('action' => 'register'));
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('username');
echo $this->Form->input('password_confirm', array('label' => 'Password', 'type' => 'password'));
echo $this->Form->input('password', array('label' => 'Password Confirm'));
echo $this->Form->end('Register');
?>