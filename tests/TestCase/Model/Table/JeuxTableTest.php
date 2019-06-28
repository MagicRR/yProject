<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JeuxTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JeuxTable Test Case
 */
class JeuxTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JeuxTable
     */
    public $Jeux;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Jeux'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Jeux') ? [] : ['className' => JeuxTable::class];
        $this->Jeux = TableRegistry::getTableLocator()->get('Jeux', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Jeux);

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
