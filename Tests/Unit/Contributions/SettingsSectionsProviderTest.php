<?php

namespace Modera\BackendGoogleAnalyticsConfigBundle\Tests\Unit\Contributions;

use Modera\BackendConfigUtilsBundle\ModeraBackendConfigUtilsBundle;
use Modera\BackendGoogleAnalyticsConfigBundle\Contributions\SettingsSectionsProvider;
use Modera\BackendToolsSettingsBundle\Section\StandardSection;
use Modera\MJRSecurityIntegrationBundle\ModeraMJRSecurityIntegrationBundle;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * @copyright 2016 Modera Foundation
 */
class SettingsSectionsProviderTest extends \PHPUnit\Framework\TestCase
{
    public function testGetItems(): void
    {
        $authorizationChecker = \Phake::mock(AuthorizationCheckerInterface::class);
        \Phake::when($authorizationChecker)
            ->isGranted(ModeraBackendConfigUtilsBundle::ROLE_ACCESS_BACKEND_SYSTEM_SETTINGS, $this->anything())
            ->thenReturn(true);
        $provider = new SettingsSectionsProvider($authorizationChecker);

        /** @var StandardSection[] $items */
        $items = $provider->getItems();

        $this->assertTrue(\is_array($items));
        $this->assertEquals(1, \count($items));

        $this->assertInstanceOf(StandardSection::class, $items[0]);
        $this->assertEquals('google-analytics', $items[0]->getId());
        $this->assertEquals('Modera.backend.configutils.runtime.SettingsListActivity', $items[0]->getActivityClass());

        $expectedMeta = [
            'activationParams' => [
                'category' => 'google-analytics',
            ],
        ];
        $this->assertEquals($expectedMeta, $items[0]->getMeta());
    }

    public function testGetItemsWithoutAccess(): void
    {
        $authorizationChecker = \Phake::mock(AuthorizationCheckerInterface::class);
        \Phake::when($authorizationChecker)
            ->isGranted(ModeraMJRSecurityIntegrationBundle::ROLE_BACKEND_USER, $this->anything())
            ->thenReturn(true);
        $provider = new SettingsSectionsProvider($authorizationChecker);

        /** @var StandardSection[] $items */
        $items = $provider->getItems();

        $this->assertTrue(\is_array($items));
        $this->assertEquals(0, \count($items));
    }
}
