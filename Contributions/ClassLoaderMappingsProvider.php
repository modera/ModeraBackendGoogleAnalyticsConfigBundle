<?php

namespace Modera\BackendGoogleAnalyticsConfigBundle\Contributions;

use Modera\ExpanderBundle\Ext\ContributorInterface;

/**
 * @copyright 2016 Modera Foundation
 */
class ClassLoaderMappingsProvider implements ContributorInterface
{
    public function getItems(): array
    {
        return [
            'Modera.backend.gaconfig' => '/bundles/moderabackendgoogleanalyticsconfig/js',
        ];
    }
}
