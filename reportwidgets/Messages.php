<?php

namespace opiy\Faq\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use opiy\Faq\Controllers\Messages as MessagesController;

/**
 * Faq sent messages report widget
 */
class Messages extends ReportWidgetBase
{

    public function render()
    {
        return $this->makePartial('messages');
    }

    public function getRecordsStats($value){

        $controller = new MessagesController;

        return $controller->getRecordsStats($value);

    }

}
