<?php

namespace Modera\BackendGoogleAnalyticsConfigBundle\Tests\Unit\DependencyInjection;

use Modera\BackendGoogleAnalyticsConfigBundle\DependencyInjection\ModeraBackendGoogleAnalyticsConfigExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author    Sergei Lissovski <sergei.lissovski@modera.org>
 * @copyright 2016 Modera Foundation
 */
class ModeraBackendGoogleAnalyticsConfigExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testLoad()
    {
        $ext = new ModeraBackendGoogleAnalyticsConfigExtension();

        $builder = new ContainerBuilder();

        $ext->load(array(), $builder);

        $settingsSectionsProvider = $builder->getDefinition('modera_backend_google_analytics_config.contributions.settings_sections_provider');
        $this->assertEquals(1, count($settingsSectionsProvider->getTag('modera_backend_tools_settings.contributions.sections_provider')));

        $classLoaderMappingsProvider = $builder->getDefinition('modera_backend_google_analytics_config.contributions.class_loader_mappings_provider');
        $this->assertEquals(1, count($classLoaderMappingsProvider->getTag('modera_mjr_integration.class_loader_mappings_provider')));
    }
}
