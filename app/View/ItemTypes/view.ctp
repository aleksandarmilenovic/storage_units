<div class="itemTypes view">
<h2><?php echo __('Item Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($itemType['ItemType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Opipljiv Tip'); ?></dt>
		<dd>
			<?php echo h($itemType['ItemType']['opipljiv_tip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aktivan Tip'); ?></dt>
		<dd>
			<?php echo h($itemType['ItemType']['aktivan_tip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($itemType['ItemType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($itemType['ItemType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Item Type'), array('action' => 'edit', $itemType['ItemType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Item Type'), array('action' => 'delete', $itemType['ItemType']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $itemType['ItemType']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
