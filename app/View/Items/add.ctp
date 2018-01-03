<div class="items form">
<?php echo $this->Form->create('Item'); ?>
	<fieldset>
		<legend><?php echo __('Add Item'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('type');
		echo $this->Form->input('kratak_opis');
		echo $this->Form->input('tezina');
		echo $this->Form->input('storniran');
		echo $this->Form->input('measurement_unit_id');
		echo $this->Form->input('fk_item_types_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Measurement Units'), array('controller' => 'measurement_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measurement Unit'), array('controller' => 'measurement_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Types'), array('controller' => 'item_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fk Item Types'), array('controller' => 'item_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materials'), array('controller' => 'materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material'), array('controller' => 'materials', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pgksps'), array('controller' => 'pgksps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pgksp'), array('controller' => 'pgksps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Semi Products'), array('controller' => 'semi_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Semi Product'), array('controller' => 'semi_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sics'), array('controller' => 'sics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sic'), array('controller' => 'sics', 'action' => 'add')); ?> </li>
	</ul>
</div>
