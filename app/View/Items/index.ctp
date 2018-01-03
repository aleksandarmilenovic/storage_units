<div class="items index">
	<h2><?php echo __('Items'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('kratak_opis'); ?></th>
			<th><?php echo $this->Paginator->sort('tezina'); ?></th>
			<th><?php echo $this->Paginator->sort('storniran'); ?></th>
			<th><?php echo $this->Paginator->sort('measurement_unit_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fk_item_types_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($items as $item): ?>
	<tr>
		<td><?php echo h($item['Item']['id']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['name']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['type']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['kratak_opis']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['tezina']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['storniran']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($item['MeasurementUnit']['name'], array('controller' => 'measurement_units', 'action' => 'view', $item['MeasurementUnit']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($item['ItemType']['id'], array('controller' => 'item_types', 'action' => 'view', $item['ItemType']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $item['Item']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $item['Item']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $item['Item']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $item['Item']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?></li>
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
