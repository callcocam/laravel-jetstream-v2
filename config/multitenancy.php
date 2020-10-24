<?php

use App\Actions\ForgetCurrentTenantAction;
use App\Actions\MakeQueueTenantAwareAction;
use App\Actions\MakeTenantCurrentAction;
use App\Actions\MigrateTenantAction;
use App\Models\Tenant;

return [
    /*
     * This class is responsible for determining which tenant should be current
     * for the given request.
     *
     * This class should extend `App\TenantFinder\TenantFinder`
     *
     */
    'tenant_finder' => \App\TenantFinder\DomainTenantFinder::class,

    /*
     * These fields are used by tenant:artisan command to match one or more tenant
     */
    'tenant_artisan_search_fields' => [
        'id',
    ],

    /*
     * These tasks will be performed when switching tenants.
     *
     * A valid task is any class that implements App\Tasks\SwitchTenantTask
     */
    'switch_tenant_tasks' => [
        // add tasks here
        App\Tasks\SwitchTenantDatabaseTask::class
    ],

    /*
     * This class is the model used for storing configuration on tenants.
     *
     * It must be or extend `App\Models\Tenant::class`
     */
    'tenant_model' => Tenant::class,

    /*
     * Se houver um inquilino atual ao despachar um trabalho, a id do inquilino atual
     * será definido automaticamente no trabalho. Quando o trabalho é executado, o conjunto
     * o inquilino no trabalho será atualizado.
     */
    'queues_are_tenant_aware_by_default' => true,

    /*
     * The connection name to reach the tenant database.
     *
     * Set to `null` to use the default connection.
     */
    'tenant_database_connection_name' => null,

    /*
     * The connection name to reach the landlord database
     */
    'landlord_database_connection_name' => 'landlord',

    /*
     * This key will be used to bind the current tenant in the container.
     */
    'current_tenant_container_key' => 'currentTenant',

    /*
     * You can customize some of the behavior of this package by using our own custom action.
     * Your custom action should always extend the default one.
     */
    'actions' => [
        'make_tenant_current_action' => MakeTenantCurrentAction::class,
        'forget_current_tenant_action' => ForgetCurrentTenantAction::class,
        'make_queue_tenant_aware_action' => MakeQueueTenantAwareAction::class,
        'migrate_tenant' => MigrateTenantAction::class,
    ],
];
