<?php

namespace Modera\BackendGoogleAnalyticsConfigBundle\Contributions;

use Sli\ExpanderBundle\Ext\ContributorInterface;

/**
 * @author    Sergei Lissovski <sergei.lissovski@modera.org>
 * @copyright 2016 Modera Foundation
 */
class ClassLoaderMappingsProvider implements ContributorInterface
{
    /**
     * {@inheritdoc}
     */
    public function getItems()
    {
        return array(
            'Modera.backend.gaconfig' => '/bundles/moderabackendgoogleanalyticsconfig/js',
        );
    }
}
