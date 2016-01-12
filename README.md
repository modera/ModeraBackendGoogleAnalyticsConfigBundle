# ModeraBackendGoogleAnalyticsBundle

[![Build Status](https://travis-ci.org/modera/ModeraBackendGoogleAnalyticsConfigBundle.svg?branch=master)](https://travis-ci.org/modera/ModeraBackendGoogleAnalyticsConfigBundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/modera/ModeraBackendGoogleAnalyticsConfigBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/modera/ModeraBackendGoogleAnalyticsConfigBundle/?branch=master)

Contributes a section to Settings page that allows to configure Google Analytics.

## Installation

Add a dependency to your composer.json by running:

    composer require modera/backend-google-analytics-config-bundle

You don't have to manually update your AppKernel class if you have `modera/module-bundle` bundle installed already, otherwise
you need to add this to your AppKernel:

    new \Modera\BackendGoogleAnalyticsConfigBundle\ModeraBackendGoogleAnalyticsConfigBundle(),

## Licensing

This bundle is under the MIT license. See the complete license in the bundle:
Resources/meta/LICENSE