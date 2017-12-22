

<?php 

if(AuthComponent::user()){
	echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout'));
}else {
	echo $this->Html->link('Login',array('controller'=>'users','action'=>'logout'));
}

?>

<div class='actions'>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php echo $this->Html->link('USERS','/users/index');?>
	</ul>
</div>