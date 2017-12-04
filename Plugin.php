<?php

namespace opiy\SmallContactForm;

use \Illuminate\Support\Facades\Event;
use System\Classes\PluginBase;
use System\Classes\PluginManager;
use Config;
use Backend;


use opiy\SmallContactForm\Models\Settings;


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
            'name' => 'opiy.smallcontactform::lang.plugin.name',
            'description' => 'opiy.smallcontactform::lang.plugin.description',
            'author' => 'Jan Vince',
            'icon' => 'icon-inbox'
        ];
    }

    public function boot() {

    }

    public function registerSettings() {

        return [
            'settings' => [
                'label' => 'opiy.smallcontactform::lang.plugin.name',
                'description' => 'opiy.smallcontactform::lang.plugin.description',
                'category'    => 'Small plugins',
                'icon' => 'icon-inbox',
                'class' => 'opiy\SmallContactForm\Models\Settings',
                'keywords' => 'small contact form message recaptcha antispam',
                'order' => 990,
                'permissions' => ['opiy.smallcontactform.access_settings'],
            ]
        ];
    }

    public function registerNavigation(){
        return [
            'smallcontactform' => [
                'label'       => 'opiy.smallcontactform::lang.navigation.main_label',
                'url'         => Backend::url('opiy/smallcontactform/messages'),
                'icon'        => 'icon-inbox',
                'permissions' => ['opiy.smallcontactform.access_messages'],
                'order'       => 990,

                'sideMenu' => [
                    'messages' => [
                        'label'       => 'opiy.smallcontactform::lang.navigation.messages',
                        'icon'        => 'icon-envelope-o',
                        'url'         => Backend::url('opiy/smallcontactform/messages'),
                        'permissions' => ['opiy.smallcontactform.access_messages']
                    ],

                ],

            ],

        ];

    }

    public function registerPermissions(){

        return [
            'opiy.smallcontactform.access_messages' => [
                'label' => 'opiy.smallcontactform::lang.permissions.access_messages',
                'tab' => 'opiy.smallcontactform::lang.plugin.name',
            ],
            'opiy.smallcontactform.delete_messages' => [
                'label' => 'opiy.smallcontactform::lang.permissions.delete_messages',
                'tab' => 'opiy.smallcontactform::lang.plugin.name',
            ],
            'opiy.smallcontactform.access_settings' => [
                'label' => 'opiy.smallcontactform::lang.permissions.access_settings',
                'tab' => 'opiy.smallcontactform::lang.plugin.name',
            ],
        ];

    }

    public function registerComponents()
    {
        return [
            'opiy\SmallContactForm\Components\SmallContactForm' => 'contactForm',
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
            'switch_icon_star' => function($value) { return '<div class="text-center"><span class="'. ($value==1 ? 'oc-icon-circle text-success' : 'text-muted oc-icon-circle text-draft') .'">' . ($value==1 ? e(trans('opiy.smallcontactform::lang.models.message.columns.new')) : e(trans('opiy.smallcontactform::lang.models.message.columns.read')) ) . '</span></div>'; },
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
            'opiy\SmallContactForm\ReportWidgets\Messages' => [
                'label'   => 'opiy.smallcontactform::lang.reportwidget.partials.messages.label',
                'context' => 'dashboard'
            ],
            'opiy\SmallContactForm\ReportWidgets\NewMessage' => [
                'label'   => 'opiy.smallcontactform::lang.reportwidget.partials.new_message.label',
                'context' => 'dashboard'
            ],
        ];
    }

}
