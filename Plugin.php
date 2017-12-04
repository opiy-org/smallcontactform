<?php

namespace opiy\Faq;

use \Illuminate\Support\Facades\Event;
use System\Classes\PluginBase;
use System\Classes\PluginManager;
use Config;
use Backend;


use opiy\Faq\Models\Settings;


class Plugin extends PluginBase {

    /**
     * @var array Plugin dependencies
     */
    public $require = [];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails() {
        return [
            'name' => 'opiy.faq::lang.plugin.name',
            'description' => 'opiy.faq::lang.plugin.description',
            'author' => 'opiy',
            'icon' => 'icon-question-circle-o'
        ];
    }

    public function boot() {

    }

    public function registerSettings() {

        return [
            'settings' => [
                'label' => 'opiy.faq::lang.plugin.name',
                'description' => 'opiy.faq::lang.plugin.description',
                'category'    => 'Small plugins',
                'icon' => 'icon-inbox',
                'class' => 'opiy\Faq\Models\Settings',
                'keywords' => 'small faq message recaptcha antispam',
                'order' => 990,
                'permissions' => ['opiy.faq.access_settings'],
            ]
        ];
    }

    public function registerNavigation(){
        return [
            'faq' => [
                'label'       => 'opiy.faq::lang.navigation.main_label',
                'url'         => Backend::url('opiy/faq/messages'),
                'icon'        => 'icon-inbox',
                'permissions' => ['opiy.faq.access_messages'],
                'order'       => 990,

                'sideMenu' => [
                    'messages' => [
                        'label'       => 'opiy.faq::lang.navigation.messages',
                        'icon'        => 'icon-envelope-o',
                        'url'         => Backend::url('opiy/faq/messages'),
                        'permissions' => ['opiy.faq.access_messages']
                    ],

                ],

            ],

        ];

    }

    public function registerPermissions(){

        return [
            'opiy.faq.access_messages' => [
                'label' => 'opiy.faq::lang.permissions.access_messages',
                'tab' => 'opiy.faq::lang.plugin.name',
            ],
            'opiy.faq.delete_messages' => [
                'label' => 'opiy.faq::lang.permissions.delete_messages',
                'tab' => 'opiy.faq::lang.plugin.name',
            ],
            'opiy.faq.access_settings' => [
                'label' => 'opiy.faq::lang.permissions.access_settings',
                'tab' => 'opiy.faq::lang.plugin.name',
            ],
        ];

    }

    public function registerComponents()
    {
        return [
            'opiy\Faq\Components\Faq' => 'Faq',

        ];
    }

    public function registerMailTemplates()
    {

        return Settings::getTranslatedTemplates();

    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
            ],
            'functions' => [
                'trans' => function($value) { return e(trans($value)); },
                'html_entity_decode' => function($value) { return html_entity_decode($value); },
                'settingsGet' => function($value, $default = NULL) { return Settings::get($value, $default); }
            ]
        ];
    }

    /**
    *	Custom list types
    */
    public function registerListColumnTypes()
    {


        return [
            'strong' => function($value) { return '<strong>'. $value . '</strong>'; },
            'text_preview' => function($value) { $content = mb_substr(strip_tags($value), 0, 150); if(count($content) > 150) { return ($content . '...'); } else { return $content; } },
            'array_preview' => function($value) { $content = mb_substr(strip_tags( implode(' --- ', $value) ), 0, 150); if(count($content) > 150) { return ($content . '...'); } else { return $content; } },
            'switch_icon_star' => function($value) { return '<div class="text-center"><span class="'. ($value==1 ? 'oc-icon-circle text-success' : 'text-muted oc-icon-circle text-draft') .'">' . ($value==1 ? e(trans('opiy.faq::lang.models.message.columns.new')) : e(trans('opiy.faq::lang.models.message.columns.read')) ) . '</span></div>'; },
            'switch_extended_input' => function($value) { if($value){return '<input type="checkbox" checked>';} else { return '<input type="checkbox">';} },
            'switch_extended' => function($value) { if($value){return '<span class="list-badge badge-success"><span class="icon-check"></span></span>';} else { return '<span class="list-badge badge-danger"><span class="icon-minus"></span></span>';} },
            'attached_images_count' => function($value){ return (count($value) ? count($value) : NULL); },
            'image_preview' => function($value) {
                $width = Settings::get('records_list_preview_width') ? Settings::get('records_list_preview_width') : 50;
                $height = Settings::get('records_list_preview_height') ? Settings::get('records_list_preview_height') : 50;

                if($value){ return "<img src='".$value->getThumb($width, $height)."' style='width: auto; height: auto; max-width: ".$width."px; max-height: ".$height."px'>"; }
            },
        ];
    }

    public function registerReportWidgets()
    {
        return [
            'opiy\Faq\ReportWidgets\Messages' => [
                'label'   => 'opiy.faq::lang.reportwidget.partials.messages.label',
                'context' => 'dashboard'
            ],
            'opiy\Faq\ReportWidgets\NewMessage' => [
                'label'   => 'opiy.faq::lang.reportwidget.partials.new_message.label',
                'context' => 'dashboard'
            ],
        ];
    }

}
