<?php

namespace Modera\BackendGoogleAnalyticsConfigBundle\Contributions;

use Modera\BackendToolsSettingsBundle\Section\StandardSection;
use Sli\ExpanderBundle\Ext\ContributorInterface;
use Modera\FoundationBundle\Translation\T;

/**
 * @author    Sergei Lissovski <sergei.lissovski@modera.org>
 * @copyright 2016 Modera Foundation
 */
class SettingsSectionsProvider implements ContributorInterface
{
    /**
     * {@inheritdoc}
     */
    public function getItems()
    {
        return [
            new StandardSection(
                'google-analytics',
                T::trans('Google analytics'),
                'Modera.backend.configutils.runtime.SettingsListActivity',
                'pie-chart',
                array(
                    'activationParams' => array(
                        'category' => 'google-analytics',
                    ),
                )
            ),
        ];
    }
}
