<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CategorieJeux Model
 *
 * @method \App\Model\Entity\CategorieJeux get($primaryKey, $options = [])
 * @method \App\Model\Entity\CategorieJeux newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CategorieJeux[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CategorieJeux|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CategorieJeux saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CategorieJeux patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CategorieJeux[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CategorieJeux findOrCreate($search, callable $callback = null, $options = [])
 */
class CategorieJeuxTable extends Table
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

        $this->setTable('categorie_jeux');
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
            ->scalar('libelle')
            ->maxLength('libelle', 255)
            ->requirePresence('libelle', 'create')
            ->allowEmptyString('libelle', false);

        return $validator;
    }
}
