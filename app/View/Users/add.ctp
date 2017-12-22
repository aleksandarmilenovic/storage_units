<?php

echo "<p1>REGISTER</p1>";

echo $this->Form->create('User');

echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('group_id', array('label' => 'Priviledges', 'type'=>'select','options'=>array('1'=>"Admin", '2' => "Operater", '3' => "Worker")));

echo $this->Form->end('Register');
