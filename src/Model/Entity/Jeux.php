<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Jeux Entity
 *
 * @property int $id
 * @property string|null $titre
 * @property int|null $categorie
 * @property \Cake\I18n\FrozenDate|null $date_de_sortie
 */
class Jeux extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'titre' => true,
        'categorie' => true,
        'date_de_sortie' => true
    ];
}
