<?php

namespace Ueg\ErrorReporter\Facades;

use Illuminate\Support\Facades\Facade;

class ErrorReporter extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
      return 'ueg-error-reporter';
    }

}
