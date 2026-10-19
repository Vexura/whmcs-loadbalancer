<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Loadbalancer\Module;
use Vexura\Whmcs\Loadbalancer\Registrar;
use Vexura\Whmcs\Loadbalancer\Automation;

add_hook('InvoiceCreated', 1, static function (array $vars): void { Automation::snapshot('loadbalancer', (int) $vars['invoiceid']); });
add_hook('InvoicePaid', 1, static function (array $vars): void { Automation::paid('loadbalancer', (int) $vars['invoiceid']); });
add_hook('AfterCronJob', 1, static function (array $vars): void { Automation::cron('loadbalancer'); });
