<div class="materials index">
	<h2><?php echo __('Materials'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('status_material'); ?></th>
			<th><?php echo $this->Paginator->sort('usluzna_proizvodnja_material'); ?></th>
			<th><?php echo $this->Paginator->sort('rating_material'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($materials as $material): ?>
	<tr>
		<td><?php echo h($material['Material']['id']); ?>&nbsp;</td>
		<td><?php echo h($material['Material']['status_material']); ?>&nbsp;</td>
		<td><?php echo h($material['Material']['usluzna_proizvodnja_material']); ?>&nbsp;</td>
		<td><?php echo h($material['Material']['rating_material']); ?>&nbsp;</td>
		<td><?php echo h($material['Material']['created']); ?>&nbsp;</td>
		<td><?php echo h($material['Material']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($material['Item']['name'], array('controller' => 'items', 'action' => 'view', $material['Item']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $material['Material']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $material['Material']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $material['Material']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $material['Material']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Material'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
