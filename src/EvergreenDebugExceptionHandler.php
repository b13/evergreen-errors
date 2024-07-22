<?php
declare(strict_types=1);

namespace B13\EvergreenErrors;

/*
 * This file is part of TYPO3 CMS-based package "evergreen-errors" by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

use TYPO3\CMS\Core\Error\DebugExceptionHandler;

class EvergreenDebugExceptionHandler extends DebugExceptionHandler
{
    /**
     * Never send a Error 50x error code.
     *
     * @param \Throwable $exception
     */
    protected function sendStatusHeaders(\Throwable $exception)
    {
        if (!headers_sent()) {
            header('HTTP/1.1 400 Bad Request');
        }
    }
}
