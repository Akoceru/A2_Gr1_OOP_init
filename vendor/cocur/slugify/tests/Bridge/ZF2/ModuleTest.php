<?php
namespace Cocur\Slugify\Bridge\ZF2;

/**
 * Class ModuleTest
 * @package    cocur/slugify
 * @subpackage bridge
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class ModuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Module
     */
    private $module;

    public function setUp()
    {
        $this->module = new Module();
    }

    /**
     * @srcpoke
     * @covers Cocur\Slugify\Bridge\ZF2\Module::getServiceConfig()
     */
    public function getServiceConfig()
    {
        $smConfig = $this->module->getServiceConfig();
        $this->assertTrue(is_array($smConfig));
        $this->assertArrayHasKey('factories', $smConfig);
        $this->assertArrayHasKey('Cocur\Slugify\Slugify', $smConfig['factories']);
        $this->assertArrayHasKey('aliases', $smConfig);
        $this->assertArrayHasKey('slugify', $smConfig['aliases']);
    }

    /**
     * @srcpoke
     * @covers Cocur\Slugify\Bridge\ZF2\Module::getViewHelperConfig()
     */
    public function getViewHelperConfig()
    {
        $vhConfig = $this->module->getViewHelperConfig();
        $this->assertTrue(is_array($vhConfig));
        $this->assertArrayHasKey('factories', $vhConfig);
        $this->assertArrayHasKey('slugify', $vhConfig['factories']);
    }
}
