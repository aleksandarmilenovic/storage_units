<?php
App::uses('AppModel', 'Model');
/**
 * Material Model
 *
 * @property Item $Item
 */
class Material extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
public $displayField = 'id';

    public $material_status = array(

        'DEVELOPMENT ' => "U razvoju",

        'IN_USE' => "Koristi se",

        'PHASE_OUT' => "Uskoro zastareva",

        'ABSOLETE' => "Zastarelo",

         'FOR_SALE' =>"Za Prodaju",

         'HRND' =>"HRND",

         'DRAFT' => "DRAFT",

    );//~!material_statuses

    public $usluzna_proizvodnja_material  = array(

        '1' => "Yes",

        '2' => "No"

    );//~!material_statuses

    public $rating_material = array(

		'GOLD ' => "GOLD",

        'SILVER' => "SILVER",

        'PLATNUM' => "PLATNUM"

    );

	public $validate = array(
		'status_material' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'usluzna_proizvodnja_material' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rating_material' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'item_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
