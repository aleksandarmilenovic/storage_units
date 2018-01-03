<div class="items view">
<h2><?php echo __('Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($item['Item']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($item['Item']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($item['Item']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kratak Opis'); ?></dt>
		<dd>
			<?php echo h($item['Item']['kratak_opis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tezina'); ?></dt>
		<dd>
			<?php echo h($item['Item']['tezina']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Storniran'); ?></dt>
		<dd>
			<?php echo h($item['Item']['storniran']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Measurement Unit'); ?></dt>
		<dd>
			<?php echo $this->Html->link($item['MeasurementUnit']['name'], array('controller' => 'measurement_units', 'action' => 'view', $item['MeasurementUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fk Item Types'); ?></dt>
		<dd>
			<?php echo $this->Html->link($item['FkItemTypes']['id'], array('controller' => 'item_types', 'action' => 'view', $item['FkItemTypes']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Item'), array('action' => 'edit', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Item'), array('action' => 'delete', $item['Item']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $item['Item']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Materials'); ?></h3>
	<?php if (!empty($item['Material'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Status Material'); ?></th>
		<th><?php echo __('Usluzna Proizvodnja Material'); ?></th>
		<th><?php echo __('Rating Material'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($item['Material'] as $material): ?>
		<tr>
			<td><?php echo $material['id']; ?></td>
			<td><?php echo $material['status_material']; ?></td>
			<td><?php echo $material['usluzna_proizvodnja_material']; ?></td>
			<td><?php echo $material['rating_material']; ?></td>
			<td><?php echo $material['created']; ?></td>
			<td><?php echo $material['modified']; ?></td>
			<td><?php echo $material['item_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'materials', 'action' => 'view', $material['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'materials', 'action' => 'edit', $material['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'materials', 'action' => 'delete', $material['id']), array('confirm' => __('Are you sure you want to delete # %s?', $material['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Material'), array('controller' => 'materials', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Pgksps'); ?></h3>
	<?php if (!empty($item['Pgksp'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Pid'); ?></th>
		<th><?php echo __('Hts/hs'); ?></th>
		<th><?php echo __('Tax Group'); ?></th>
		<th><?php echo __('ECC'); ?></th>
		<th><?php echo __('Release Date'); ?></th>
		<th><?php echo __('For Distributors'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Service Production'); ?></th>
		<th><?php echo __('Project'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($item['Pgksp'] as $pgksp): ?>
		<tr>
			<td><?php echo $pgksp['pid']; ?></td>
			<td><?php echo $pgksp['hts/hs']; ?></td>
			<td><?php echo $pgksp['tax_group']; ?></td>
			<td><?php echo $pgksp['ECC']; ?></td>
			<td><?php echo $pgksp['release_date']; ?></td>
			<td><?php echo $pgksp['for_distributors']; ?></td>
			<td><?php echo $pgksp['status']; ?></td>
			<td><?php echo $pgksp['service_production']; ?></td>
			<td><?php echo $pgksp['project']; ?></td>
			<td><?php echo $pgksp['item_id']; ?></td>
			<td><?php echo $pgksp['created']; ?></td>
			<td><?php echo $pgksp['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pgksps', 'action' => 'view', $pgksp['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pgksps', 'action' => 'edit', $pgksp['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pgksps', 'action' => 'delete', $pgksp['id']), array('confirm' => __('Are you sure you want to delete # %s?', $pgksp['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pgksp'), array('controller' => 'pgksps', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Semi Products'); ?></h3>
	<?php if (!empty($item['SemiProduct'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Usluzna Proizvodnja'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($item['SemiProduct'] as $semiProduct): ?>
		<tr>
			<td><?php echo $semiProduct['status']; ?></td>
			<td><?php echo $semiProduct['usluzna_proizvodnja']; ?></td>
			<td><?php echo $semiProduct['created']; ?></td>
			<td><?php echo $semiProduct['modified']; ?></td>
			<td><?php echo $semiProduct['item_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'semi_products', 'action' => 'view', $semiProduct['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'semi_products', 'action' => 'edit', $semiProduct['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'semi_products', 'action' => 'delete', $semiProduct['id']), array('confirm' => __('Are you sure you want to delete # %s?', $semiProduct['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Semi Product'), array('controller' => 'semi_products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sics'); ?></h3>
	<?php if (!empty($item['Sic'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($item['Sic'] as $sic): ?>
		<tr>
			<td><?php echo $sic['status']; ?></td>
			<td><?php echo $sic['rating']; ?></td>
			<td><?php echo $sic['item_id']; ?></td>
			<td><?php echo $sic['created']; ?></td>
			<td><?php echo $sic['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sics', 'action' => 'view', $sic['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sics', 'action' => 'edit', $sic['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sics', 'action' => 'delete', $sic['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sic['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sic'), array('controller' => 'sics', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
