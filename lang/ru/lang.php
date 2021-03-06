<?php

return [
    'plugin' => [
        'name' => 'Вопросы',
        'description' => 'Вопросы и ответы',
        'category' => 'Small plugins',
    ],

    'permissions' => [
        'access_messages' => 'Show form messages',
        'delete_messages' => 'Delete stored messages',
        'access_settings' => 'Show form settings',
    ],

    'navigation' => [
        'main_label' => 'Вопросы',
        'messages' => 'Сообщения',
    ],

    'controller' => [

        'contact_form' => [
            'name' => 'Вопросы',
            'description' => 'Вставьте ответы на страницу',
            'no_fields' => 'Please add some form fields in backend administration first (in Settings > Small Faq > Fields)...',
        ],

        'filter' => [
            'date' => 'Диапазон дат',
        ],

        'scoreboard' => [
            'records_count' => 'Сообщений',
            'latest_record' => 'Последнее от ',
            'new_count' => 'Новые',
            'read_count' => 'Прочитанные',
            'all_count' => 'Всего',
            'all_description' => 'Сообщения',
            'settings_btn' => 'Настройки',
            'mark_read' => 'Отметить как прочитанное',
            'mark_read_confirm' => 'Really set selected messages as read?',
            'mark_read_success' => 'Successfully marked as read.',
            'mark_state' => 'Опубликовать',
            'mark_state_confirm' => 'Really set selected messages as visible?',
            'mark_state_success' => 'Successfully marked as visible.',
        ],

        'preview' => [
            'record_not_found' => 'Сообщение не найдены!',
        ],

    ],

    'models' => [

        'message' => [

            'columns' => [
                'datetime' => 'Дата и время',
                'form_data' => 'Данные формы',
                'name' => 'Имя',
                'email' => 'Email',
                'message' => 'Вопрос',
                'new_message' => 'Статус',
                'new' => 'Новый',
                'read' => 'Прочитано',
                'reply' => 'Ответ',
                'remote_ip' => 'АйПи отправителя',
                'state' => 'Состояние',
                'state_hidden' => 'Скрыто',
                'state_visible' => 'Опубликовано',

            ]

        ],


    ],

    'controllers' => [

        'messages' => [

            'list_title' => 'Сообщения',
            'preview' => 'Предварительный просмотр',
            'preview_title' => 'Faq message',
            'preview_date' => 'Дата:',
            'preview_content_title' => 'Содержимое:',
            'remote_ip' => 'Отправлено с айпи: ',

        ],

        'index' => [
            'unauthorized' => 'Unauthorized access',
        ],

    ],

    'mail' => [

        'templates' => [

            'autoreply' => 'Form autoreply message (English)',
            'autoreply_cs' => 'Form autoreply message (Czech)',

            'notification' => 'Form notification message (English)',
            'notification_cs' => 'Form notification message (Czech)',

        ]

    ],

    'reportwidget' => [

        'partials' => [

            'messages' => [
                'label' => 'Faq - Messages stats',
                'title' => 'Стата вопросов',
                'messages_all' => 'Все',
                'messages_new' => 'Новые',
                'messages_read' => 'Прочитанные',
            ],

            'new_message' => [
                'label' => 'Faq - New messages',
                'title' => 'Новые вопросы',
                'link_text' => 'Ответить',
            ],

        ],

    ],

    'settings' => [

        'form' => [

            'css_class' => 'Form CSS class',

            'use_placeholders' => 'Use placeholders',
            'use_placeholders_comment' => 'Placeholders will be shown instead of field labels',

            'success_msg' => 'Form success message',
            'success_msg_placeholder' => 'Your data was sent.',

            'error_msg' => 'Form error message',
            'error_msg_placeholder' => 'There was an error sending your data!',

            'allow_ajax' => 'Enable AJAX',
            'allow_ajax_comment' => 'Allow AJAX with fallback for non JavaScript browsers',

            'allow_confirm_msg' => 'Ask confirmation before form send',
            'allow_confirm_msg_comment' => 'Add confirm dialog before sending',

            'send_confirm_msg' => 'Confirmation text',
            'send_confirm_msg_placeholder' => 'Are you sure?',

            'hide_after_success' => 'Hide form after successful send',
            'hide_after_success_comment' => 'Show only success message without form',

            'add_assets' => 'Add assets',
            'add_assets_comment' => 'Automatically add necessary CSS and JS assets (more about assets in README.md file)',

            'add_css_assets' => 'Add CSS assets',
            'add_css_assets_comment' => 'All necesssary styles will be included',

            'add_js_assets' => 'Add JavaScript assets',
            'add_js_assets_comment' => 'All necesssary JavaScripts will be included',


        ],

        'buttons' => [
            'send_btn_text' => 'Send button text',
            'send_btn_text_placeholder' => 'Send',

            'send_btn_css_class' => 'Send button CSS class',
            'send_btn_css_class_placeholder' => 'btn btn-primary',

            'send_btn_wrapper_css' => 'Send button wrapper CSS class',
            'send_btn_wrapper_css_placeholder' => 'form-group',

        ],

        'redirect' => [

            'allow_redirect' => 'Redirect after submit',
            'allow_redirect_comment' => 'Redirect to another page after successfull submit',

            'redirect_url' => 'Page URL to redirect to',
            'redirect_url_comment' => 'Enter your page URL (eg. /contact/thank-you)',
            'redirect_url_placeholder' => '/contact/thank-you',

            'redirect_url_external' => 'External URL',
            'redirect_url_external_comment' => 'This is external URL path   (eg. http://www.domain.com)',

        ],

        'form_fields' => [
            'prompt' => 'Add new form field',

            'name' => 'FIELD NAME',
            'name_comment' => 'Lower case without special characters (eg. name, email, home_address, ...)',

            'type' => 'Field type',

            'label' => 'Label',
            'label_placeholder' => 'Full name',

            'field_styling' => 'Custom CSS class',
            'field_styling_comment' => 'Change default Bootstrap styles',

            'autofocus' => 'Autofocus field',
            'autofocus_comment' => 'Autofocus this form field',

            'wrapper_css' => 'Wrapper CSS class',
            'wrapper_css_placeholder' => 'form-group',

            'field_css' => 'Field CSS class',
            'field_css_placeholder' => 'form-control',

            'field_validation' => 'Field validation',
            'field_validation_comment' => 'Add field validation rules',

            'validation' => 'Validation',
            'validation_prompt' => 'Add validation',

            'validation_type' => 'Validation rule',

            'validation_error' => 'Validation error message',
            'validation_error_placeholder' => 'Please enter valid data.',
            'validation_error_comment' => 'Error message to use when validation fails',

            'custom' => 'Custom field',
            'custom_description' => 'Custom field with validation option',


        ],

        'form_field_types' => [
            'text' => 'Text',
            'email' => 'Email',
            'textarea' => 'Textarea',
            'checkbox' => 'Checkbox',
        ],

        'form_field_validation' => [
            'select' => '--- Select validation ---',
            'required' => 'Required',
            'email' => 'Email',
            'numeric' => 'Numeric',
        ],

        'email' => [
            'address_from' => 'From address',
            'address_from_placeholder' => 'john.doe@domain.com',

            'address_from_name' => 'From address name',
            'address_from_name_placeholder' => 'John Doe',

            'subject' => 'Email subject',
            'subject_comment' => 'Set only if you want other than defined in Settings > Mail templates.',

            'template' => 'Email template',
            'template_comment' => 'Code of email template created in Settings > Email templates. Left empty for default template: opiy.faq::mail.autoreply.',

            'allow_email_queue' => 'Queueing mail',
            'allow_email_queue_comment' => 'Add email to queue instead of immediately send. You have to configure your OctoberCMS queue first!',

            'allow_notifications' => 'Allow notifications',
            'allow_notifications_comment' => 'Send notification after form has been sent',

            'notification_address_to' => 'Send notification to email',
            'notification_address_to_placeholder' => 'notifications@domain.com',

            'notification_address_from_form' => 'Form email field as notification FROM address',
            'notification_address_from_form_comment' => 'Set from address to email entered in faq (the field must be set in column mapping), so you can directly reply to notification.',

            'allow_autoreply' => 'Allow autoreply',
            'allow_autoreply_comment' => 'Send a form content copy to author',

            'autoreply_name_field' => 'NAME form field',
            'autoreply_name_field_empty_option' => '-- Select --',
            'autoreply_name_field_comment' => 'Must be type of Text.<br><em>Save and refresh this page if you can\'t see your fields.</em>',

            'autoreply_email_field' => 'EMAIL address form field',
            'autoreply_email_field_empty_option' => '-- Select --',
            'autoreply_email_field_comment' => 'Must be type of Email.<br><em>Save and refresh this page if you can\'t see your fields.</em>',

            'autoreply_message_field' => 'MESSAGE form field',
            'autoreply_message_field_empty_option' => '-- Select --',
            'autoreply_message_field_comment' => 'Must be type of Textarea or Text.<br><em>Save and refresh this page if you can\'t see your fields.</em>',

            'notification_template' => 'Notification email template',
            'notification_template_comment' => 'Code of email template created in Settings > Email templates. Left empty for default template: opiy.faq::mail.autoreply.',

        ],

        'antispam' => [
            'add_antispam' => 'Add antispam protection',
            'add_antispam_comment' => 'Add simple but effective passive antispam control (more info in README.md file)',

            'antispam_delay' => 'Antispam delay (s)',
            'antispam_delay_comment' => 'Delay protection for too fast form sending (usually by robots)',
            'antispam_delay_placeholder' => '3',

            'antispam_label' => 'Antispam field label',
            'antispam_label_comment' => 'Label will be visible for non JavaScript enabled browsers',
            'antispam_label_placeholder' => 'Please clear this field',

            'antispam_error_msg' => 'Error message',
            'antispam_error_msg_comment' => 'Message to show to user when antispam protection is triggered',
            'antispam_error_msg_placeholder' => 'Please empty this field!',

            'antispam_delay_error_msg' => 'Delay error message',
            'antispam_delay_error_msg_comment' => 'Message to show to user when form was sent too fast',
            'antispam_delay_error_msg_placeholder' => 'Form sent too fast! Please wait few seconds and try again!',

            'add_ip_protection' => 'Check sender\'s IP',
            'add_ip_protection_comment' => 'Do not allow too many form submits from one IP address',

            'add_ip_protection_count' => 'Maximum form submits during a day',
            'add_ip_protection_count_comment' => 'Number of allowed submits from one IP address during a single day',
            'add_ip_protection_count_placeholder' => '3',

            'add_ip_protection_error_get_ip' => 'We wasn\'t able to determine your IP address!',

            'add_ip_protection_error_too_many_submits' => 'Too many submits error message',
            'add_ip_protection_error_too_many_submits_comment' => 'Error message to show to the user',
            'add_ip_protection_error_too_many_submits_placeholder' => 'Too many form submits from one address today!',


        ],

        'mapping' => [

            'hint' => [
                'title' => 'Why fields mapping?',
                'content' => '
        <p>You can build a custom form with own field names and types.</p>
        <p>System writes all form data in database, but for quick overview Name, Email and Message columns are visible separately in Messages list.</p>
        <p>So you have to help system to identify these columns by mapping to your form fields.</p>
        <p><em>These mappings are also used for autoreply emails where at least Email field mapping is important.</em></p>
        ',
            ],

            'warning' => [
                'title' => 'Can\'t select your form fields?',
                'content' => '
        <p>If you don\'t see your form fields, click on button Save at the bottom of this page and then reload page (F5 or Ctr+R / Cmd+R).</p>
        ',
            ],

        ],

        'tabs' => [
            'form' => 'Form',
            'buttons' => 'Send button',
            'form_fields' => 'Fields',
            'mapping' => 'Columns mapping',
            'email' => 'Email',
            'antispam' => 'Antispam',
        ],

    ],

    'permissions' => [
        'access_messages' => 'Access messages list',
        'access_settings' => 'Manage backend preferences',
    ],
];
