<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jeux Model
 *
 * @method \App\Model\Entity\Jeux get($primaryKey, $options = [])
 * @method \App\Model\Entity\Jeux newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Jeux[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Jeux|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Jeux saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Jeux patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Jeux[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Jeux findOrCreate($search, callable $callback = null, $options = [])
 */
class JeuxTable extends Table
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

        $this->setTable('jeux');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->allowEmptyString('titre');

        $validator
            ->integer('categorie')
            ->allowEmptyString('categorie');

        $validator
            ->date('date_de_sortie')
            ->allowEmptyDate('date_de_sortie');

        return $validator;
    }
}
