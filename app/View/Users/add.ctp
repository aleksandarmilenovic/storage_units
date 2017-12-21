<?php

echo "<p1>REGISTER</p1>";

echo $this->Form->create('User');

echo $this->Form->input('username');
echo $this->Form->input('password');

echo $this->Form->end('Register');
