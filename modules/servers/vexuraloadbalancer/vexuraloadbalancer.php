<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Loadbalancer\Module;
use Vexura\Whmcs\Loadbalancer\Registrar;
use Vexura\Whmcs\Loadbalancer\Automation;

/** Load Balancer: WHMCS MetaData callback. */
function vexuraloadbalancer_MetaData(): array
{
    return ['DisplayName' => 'Vexura · Load Balancer', 'APIVersion' => '1.1', 'RequiresServer' => true, 'DefaultSSLPort' => 443];
}

/** Load Balancer: WHMCS ConfigOptions callback. */
function vexuraloadbalancer_ConfigOptions(): array
{
    return Module::config('loadbalancer');
}

/** Load Balancer: WHMCS TestConnection callback. */
function vexuraloadbalancer_TestConnection(array $params): array
{
    return Module::connection($params);
}

/** Load Balancer: WHMCS ClientArea callback. */
function vexuraloadbalancer_ClientArea(array $params): array
{
    return Module::clientArea('loadbalancer', $params);
}

/** Load Balancer: WHMCS AdminCustomButtonArray callback. */
function vexuraloadbalancer_AdminCustomButtonArray(): array
{
    return ['Bereitstellung prüfen' => 'RefreshStatus', 'Bezahlte Rechnungen abgleichen' => 'SyncPaidInvoices'];
}

/** Load Balancer: WHMCS CreateAccount callback. */
function vexuraloadbalancer_CreateAccount(array $params): string
{
    return Module::run('loadbalancer', 'create', $params);
}

/** Load Balancer: WHMCS RefreshStatus callback. */
function vexuraloadbalancer_RefreshStatus(array $params): string
{
    return Module::run('loadbalancer', 'create', $params);
}

/** Load Balancer: WHMCS SyncPaidInvoices callback. */
function vexuraloadbalancer_SyncPaidInvoices(array $params): string
{
    return Module::run('loadbalancer', 'sync', $params);
}

/** Load Balancer: WHMCS TerminateAccount callback. */
function vexuraloadbalancer_TerminateAccount(array $params): string
{
    return Module::run('loadbalancer', 'terminate', $params);
}

/** Load Balancer: WHMCS SuspendAccount callback. */
function vexuraloadbalancer_SuspendAccount(array $params): string
{
    return Module::run('loadbalancer', 'suspend', $params);
}

/** Load Balancer: WHMCS UnsuspendAccount callback. */
function vexuraloadbalancer_UnsuspendAccount(array $params): string
{
    return Module::run('loadbalancer', 'unsuspend', $params);
}
