<?php

namespace Modera\BackendGoogleAnalyticsConfigBundle\Contributions;

use Modera\BackendToolsSettingsBundle\Section\StandardSection;
use Sli\ExpanderBundle\Ext\ContributorInterface;
use Modera\FoundationBundle\Translation\T;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Modera\BackendConfigUtilsBundle\ModeraBackendConfigUtilsBundle;

/**
 * @author    Sergei Lissovski <sergei.lissovski@modera.org>
 * @copyright 2016 Modera Foundation
 */
class SettingsSectionsProvider implements ContributorInterface
{
    private $items;

    /**
     * SettingsSectionsProvider constructor.
     * @param AuthorizationCheckerInterface $authorizationChecker
     */
    public function __construct(AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->items = array();
        if ($authorizationChecker->isGranted(ModeraBackendConfigUtilsBundle::ROLE_ACCESS_BACKEND_SYSTEM_SETTINGS)) {
            $this->items[] = new StandardSection(
                'google-analytics',
                T::trans('Google analytics'),
                'Modera.backend.configutils.runtime.SettingsListActivity',
                'pie-chart',
                array(
                    'activationParams' => array(
                        'category' => 'google-analytics',
                    ),
                )
            );
        }
    }
    /**
     * {@inheritdoc}
     */
    public function getItems()
    {
        return $this->items;
    }
}
