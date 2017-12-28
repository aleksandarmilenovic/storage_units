

<?php 

if(AuthComponent::user()){
	echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout'));
}else {
	echo $this->Html->link('Login',array('controller'=>'users','action'=>'login'));
}
echo "<br>";

echo $this->Html->link('Register',array('controller'=>'users','action'=>'add'));

?>

<div class='actions'>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php echo $this->Html->link('USERS','/users/index');?>
		<?php echo $this->Html->link('PRIVILEGUES','/groups/index');?>
		<?php echo $this->Html->link('Mere', '/MeasurementUnits/index');?>
	</ul>
</div>