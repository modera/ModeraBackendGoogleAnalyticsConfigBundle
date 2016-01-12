<?php

namespace Modera\BackendGoogleAnalyticsConfigBundle\Tests\Unit\Contributions;

use Modera\BackendGoogleAnalyticsConfigBundle\Contributions\SettingsSectionsProvider;
use Modera\BackendToolsSettingsBundle\Section\StandardSection;

/**
 * @author    Sergei Lissovski <sergei.lissovski@modera.org>
 * @copyright 2016 Modera Foundation
 */
class SettingsSectionsProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testGetItems()
    {
        $provider = new SettingsSectionsProvider();

        /* @var StandardSection[] $items */
        $items = $provider->getItems();

        $this->assertTrue(is_array($items));
        $this->assertEquals(1, count($items));

        $this->assertInstanceOf('Modera\BackendToolsSettingsBundle\Section\StandardSection', $items[0]);
        $this->assertEquals('google-analytics', $items[0]->getId());
        $this->assertEquals('Modera.backend.configutils.runtime.SettingsListActivity', $items[0]->getActivityClass());

        $expectedMeta = array(
            'activationParams' => array(
                'category' => 'analytics',
            ),
        );
        $this->assertEquals($expectedMeta, $items[0]->getMeta());
    }
}
