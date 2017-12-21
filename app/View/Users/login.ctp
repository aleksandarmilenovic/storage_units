<h1>LOGIN</h1>
<br>
<br>
<br>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');

echo $this->Form->end('Login');