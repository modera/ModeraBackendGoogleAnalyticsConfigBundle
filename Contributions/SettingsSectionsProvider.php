<?php

namespace Modera\BackendGoogleAnalyticsConfigBundle\Contributions;

use Modera\BackendConfigUtilsBundle\ModeraBackendConfigUtilsBundle;
use Modera\BackendToolsSettingsBundle\Section\StandardSection;
use Modera\ExpanderBundle\Ext\ContributorInterface;
use Modera\FoundationBundle\Translation\T;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * @copyright 2016 Modera Foundation
 */
class SettingsSectionsProvider implements ContributorInterface
{
    private ?array $items = null;

    public function __construct(
        private AuthorizationCheckerInterface $authorizationChecker,
    ) {
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
