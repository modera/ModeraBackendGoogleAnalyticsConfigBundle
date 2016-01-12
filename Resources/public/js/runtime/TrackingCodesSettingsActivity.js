/**
 * @author Sergei Lissovski <sergei.lissovski@modera.org>
 */
Ext.define('Modera.backend.gaconfig.runtime.TrackingCodesSettingsActivity', {
    extend: 'MF.activation.activities.AbstractActivity',

    requires: [
        'Modera.backend.gaconfig.view.TrackingCodesSettingsPanel',
        'Ext.data.Store'
    ],

    getId: function() { // override
        return 'ga-analytics-settings';
    },

    doCreateUi: function(params, callback) { // override
        var query = {
            filter: [ { property: 'category', value: 'eq:analytics' } ],
            hydration: {
                profile: 'list'
            }
        };

        Actions.ModeraBackendConfigUtils_Default.list(query, function(r) {
            console.log(' >>>> ', r.items);

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

            console.log(' >>>> ', r.items);

            //Ext.each(r.items, function(item) {
            //    var cmp = ui.down(Ext.String.format('component[name={0}]', item.name));
            //    if (cmp) {
            //        cmp.serverConfig = item;
            //        cmp.setValue(item.value);
            //    }
            //});

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