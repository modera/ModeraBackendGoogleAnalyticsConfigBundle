/**
 * @copyright 2016 Modera Foundation
 */
Ext.define('Modera.backend.gaconfig.runtime.TrackingCodesSettingsActivity', {
    extend: 'MF.activation.activities.AbstractActivity',

    requires: [
        'Modera.backend.gaconfig.view.TrackingCodesSettingsPanel',
        'Ext.data.Store'
    ],

    // override
    getId: function() {
        return 'ga-analytics-settings';
    },

    // override
    doCreateUi: function(params, callback) {
        var query = {
            filter: [ { property: 'category', value: 'eq:analytics' } ],
            hydration: {
                profile: 'list'
            }
        };

        Actions.ModeraBackendConfigUtils_Default.list(query, function(r) {
            var ui = Ext.create('Modera.backend.gaconfig.view.TrackingCodesSettingsPanel', {
                store: Ext.create('Ext.data.Store', {
                    fields: [''],
                    proxy: {
                        type: 'memory'
                    },
                    data: r.items,
                    autoLoad: true
                })
            });

            callback(ui);
        });
    },

    // private
    configPropertyValueChanged: function(cmp) {
        var params = {
            record: {
                id: cmp.serverConfig.id,
                value: cmp.getValue()
            }
        };

        Actions.ModeraBackendConfigUtils_Default.update(params, Ext.emtpyFn);
    },

    // override
    attachListeners: function(ui) {
        var me = this;

        Ext.each(ui.query('mfc-inplacefield'), function(f) {
            f.on('editfinished', function(cmp) {
                me.configPropertyValueChanged(cmp);
            });
        });

        Ext.each(ui.query('mfc-switchfield'), function(f) {
            f.on('optionchanged', function(cmp) {
                me.configPropertyValueChanged(cmp);
            });
        });
    }
});
