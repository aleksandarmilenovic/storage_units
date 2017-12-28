<div class="materials form">
<?php echo $this->Form->create('Material'); ?>
	<fieldset>
		<legend><?php echo __('Edit Material'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('status_material');
		echo $this->Form->input('usluzna_proizvodnja_material');
		echo $this->Form->input('rating_material');
		echo $this->Form->input('item_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Material.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Material.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Materials'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
