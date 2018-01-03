<div class="itemTypes form">
<?php echo $this->Form->create('ItemType'); ?>
	<fieldset>
		<legend><?php echo __('Add Item Type'); ?></legend>
	<?php
		echo $this->Form->input('opipljiv_tip');
		echo $this->Form->input('aktivan_tip');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Item Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
