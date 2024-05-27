<?php

namespace Modera\BackendGoogleAnalyticsConfigBundle\Contributions;

use Modera\BackendConfigUtilsBundle\ModeraBackendConfigUtilsBundle;
use Modera\BackendToolsSettingsBundle\Section\StandardSection;
use Modera\FoundationBundle\Translation\T;
use Sli\ExpanderBundle\Ext\ContributorInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * @author    Sergei Lissovski <sergei.lissovski@modera.org>
 * @copyright 2016 Modera Foundation
 */
class SettingsSectionsProvider implements ContributorInterface
{
    private ?array $items = null;

    private AuthorizationCheckerInterface $authorizationChecker;

    public function __construct(AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    public function getItems(): array
    {
        if (null === $this->items) {
            $this->items = [];
            if ($this->authorizationChecker->isGranted(ModeraBackendConfigUtilsBundle::ROLE_ACCESS_BACKEND_SYSTEM_SETTINGS)) {
                $this->items[] = new StandardSection(
                    'google-analytics',
                    T::trans('Google analytics'),
                    'Modera.backend.configutils.runtime.SettingsListActivity',
                    'pie-chart',
                    [
                        'activationParams' => [
                            'category' => 'google-analytics',
                        ],
                    ]
                );
            }
        }

        return $this->items;
    }
}
