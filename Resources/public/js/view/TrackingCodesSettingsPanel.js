/**
 * @author Sergei Lissovski <sergei.lissovski@modera.org>
 */
Ext.define('Modera.backend.gaconfig.view.TrackingCodesSettingsPanel', {
    extend: 'Ext.grid.Panel',

    requires: [
        'MF.Util'
    ],

    /**
     * @param {Object} config
     */
    constructor: function (config) {
        var defaultConfig = {
            columns: [
                { text: 'Tracking code', dataIndex: 'trackingCode' },
                { text: 'Name', dataIndex: 'description' }
            ]
        };

        Ext.apply(this, Ext.apply(defaultConfig, config || {}));
    }
});
