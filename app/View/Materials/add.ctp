<div class="materials form">
<?php echo $this->Form->create('Material'); ?>
	<fieldset>
		<legend><?php echo __('Add Material'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('type');
		echo $this->Form->input('kratak_opis');
		echo $this->Form->input('tezina');
		echo $this->Form->input('storniran');
		//echo $this->Form->input('measurement_unit_id', array('option' => $measuementUnits));
		echo $this->Form->input('measurement_unit_id', array('class' => 'form-control','empty' => 'Select Item measuement units', 'type'=>'select','options'=> $measuementUnits));
		//echo $this->Form->input('fk_item_types_id', array('option' => $itemTypes));
		echo $this->Form->input('fk_item_types_id', array('class' => 'form-control','empty' => 'Select Item Type', 'type'=>'select','options'=> $itemTypes));
	

		echo $this->Form->input('status_material',array('label' => 'Usluzna proizvodnja', 'type'=>'select','options'=> array(

        'DEVELOPMENT ' => "U razvoju",

        'IN_USE' => "Koristi se",

        'PHASE_OUT' => "Uskoro zastareva",

        'ABSOLETE' => "Zastarelo",

         'FOR_SALE' =>"Za Prodaju",

         'HRND' =>"HRND",

         'DRAFT' => "DRAFT",

    )));
		echo $this->Form->input('usluzna_proizvodnja_material', array('label' => 'Usluzna proizvodnja', 'type'=>'select','options'=> array(

        '1' => "Yes",

        '2' => "No"

    )));
		//echo $this->Form->input('rating_material', array('option' => $ratingMaterial));
		echo $this->Form->input('rating_material', array('label' => 'Rating', 'type'=>'select','options'=>array('GOLD ' => "GOLD",'SILVER' => "SILVER",'PLATNUM' => "PLATNUM")));
		echo $this->Form->input('item_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Materials'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
