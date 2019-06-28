<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategorieJeuxTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategorieJeuxTable Test Case
 */
class CategorieJeuxTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategorieJeuxTable
     */
    public $CategorieJeux;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CategorieJeux'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CategorieJeux') ? [] : ['className' => CategorieJeuxTable::class];
        $this->CategorieJeux = TableRegistry::getTableLocator()->get('CategorieJeux', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategorieJeux);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
