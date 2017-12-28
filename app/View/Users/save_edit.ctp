<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit_Save'); ?></legend>
	<?php
		//echo $this->Form->input('OPTIONAL_ID');
		echo $this->Form->input('USER_ID');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('group_id', array('label' => 'Priviledges', 'type'=>'select','options'=>array('1'=>"Admin", '2' => "Operater", '3' => "Worker")));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'),array('action' => 'save_edit')); ?>
</div>


