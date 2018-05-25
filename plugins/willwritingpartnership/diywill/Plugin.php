<?php namespace WillWritingPartnership\DIYWill;

use Backend;
use System\Classes\PluginBase;

/**
 * DIYWill Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'DIYWill',
            'description' => 'No description provided yet...',
            'author'      => 'WillWritingPartnership',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'WillWritingPartnership\DIYWill\Components\Beneficiaries' => 'beneficiaries',
            'WillWritingPartnership\DIYWill\Components\ClientData' => 'clientdata',
            'WillWritingPartnership\DIYWill\Components\Executors' => 'executors',
            'WillWritingPartnership\DIYWill\Components\FuneralArrangements' => 'funeralarrangements',
            'WillWritingPartnership\DIYWill\Components\Payments' => 'payments',
            'WillWritingPartnership\DIYWill\Components\PDFWill' => 'pdfwill',
            'WillWritingPartnership\DIYWill\Components\ProfExecutors' => 'profexecutors',
            'WillWritingPartnership\DIYWill\Components\ResBeneficiaries' => 'resbeneficiaries',
            'WillWritingPartnership\DIYWill\Components\TermsAndCon' => 'termsandcon',
            'WillWritingPartnership\DIYWill\Components\Testators' => 'testators',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {

        return [
            'willwritingpartnership.diywill.some_permission' => [
                'tab' => 'DIYWill',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {


        return [
            'diywill' => [
                'label'       => 'DIYWill',
                'url'         => Backend::url('willwritingpartnership/diywill/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['willwritingpartnership.diywill.*'],
                'order'       => 500,
            ],
        ];
    }
}
