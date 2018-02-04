<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Styles Model
 *
 * @property \App\Model\Table\CdsTable|\Cake\ORM\Association\HasMany $Cds
 *
 * @method \App\Model\Entity\Style get($primaryKey, $options = [])
 * @method \App\Model\Entity\Style newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Style[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Style|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Style patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Style[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Style findOrCreate($search, callable $callback = null, $options = [])
 */
class StylesTable extends Table
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

        $this->setTable('styles');
		$this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Cds', [
            'foreignKey' => 'style_id'
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
