<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 06.09.17
 * Time: 01:06
 */

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class CdsTable extends Table
{
	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config)
	{
		parent::initialize($config);

		$this->setTable('cds');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');

		$this->belongsTo('Compositor', [
			'foreignKey' => 'compositor_id',
			'joinType' => 'INNER',
			'className' => 'Artists'
		]);
		$this->belongsTo('Interpreter', [
			'foreignKey' => 'interpreter_id',
			'joinType' => 'INNER',
			'className' => 'Artists'
		]);

		$this->belongsTo('Styles', [
			'foreignKey' => 'style_id',
			'joinType' => 'INNER',
			'className' => 'Styles'
		]);

		$this->belongsTo('Collections', [
			'foreignKey' => 'collections_id',
			'joinType' => 'INNER',
			'className' => 'Collections',

		]);
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator)
	{
		$validator
			->integer('id')
			->allowEmpty('id', 'create');

		$validator
			->scalar('first_name')
			->requirePresence('first_name', 'create')
			->notEmpty('first_name')
			->add('first_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

		$validator
			->scalar('last_name')
			->allowEmpty('last_name');

		return $validator;
	}

	/**
	 * Returns a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
	 * @return \Cake\ORM\RulesChecker
	 */
	public function buildRules(RulesChecker $rules)
	{
		$rules->add($rules->isUnique(['first_name']));

		return $rules;
	}
}