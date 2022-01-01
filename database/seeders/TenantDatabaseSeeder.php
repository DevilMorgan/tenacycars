<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class TenantDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addRolesAndPermissions();
    }
    private function addRolesAndPermissions()
    {
        //ROLES
        //Admin
        $adminRole = Role::create(['name' => 'Administrador']);
        //Manager
        $managerRole = Role::create(['name' => 'Gestor']);
        //Intern
        $internRole = Role::create(['name' => 'Interno']);
        //Comercial
        $commercialRole = Role::create(['name' => 'Comercial']);
        //Tech
        $techRole = Role::create(['name' => 'Tecnico']);
        //Estagiario
        $traineeRole = Role::create(['name' => 'Estagiario']);
        //Recursos Humanos
        $hrRole = Role::create(['name' => 'Recursos']);
        //PERMISSIONS
        //Aministrar
        $adminPermissions = collect(['Todos Contactos', 'Todos Produtos', 'Todas Opns', 'Todos Agendamentos (T)', 'Todos Agendamentos (C)', 'Todos Relatorios (T)', 'Todos Relatorios (C)'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        //Contacts
        $contactPermissions = collect(['Ver Contacto', 'Criar Contacto', 'Editar Contacto', 'Eliminar Contacto'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        //Products
        $productPermissions = collect(['Ver Produto', 'Criar Produto', 'Editar Produto', 'Eliminar Produto'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        //Opns
        $opnPermissions = collect(['Ver Opn', 'Criar Opn', 'Editar Opn', 'Eliminar Opn'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        //Agendamentos (Tecnica)
        $schedulePermissions = collect(['Ver Agendamento (T)', 'Criar Agendamento (T)', 'Editar Agendamento (T)', 'Eliminar Agendamento (T)'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        //Agendamentos (Comercial)
        $scheduleCPermissions = collect(['Ver Agendamento (C)', 'Criar Agendamento (C)', 'Editar Agendamento (C)', 'Eliminar Agendamento (C)'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        //Relatorios (Tecnica)
        $reportPermissions = collect(['Ver Relatorio (T)', 'Criar Relatorio (T)', 'Editar Relatorio (T)', 'Eliminar Relatorio (T)'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        //Relatorios (Comercial)
        $reportCPermissions = collect(['Ver Relatorio (C)', 'Criar Relatorio (C)', 'Editar Relatorio (C)', 'Eliminar Relatorio (C)'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        //emails
        $emailPermissions = collect(['Email Opn', 'Email Agendamento', 'Email Backups'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        //ASSOCIAR
        $adminRole->givePermissionTo($adminPermissions);
        $adminRole->givePermissionTo($contactPermissions);
        $adminRole->givePermissionTo($productPermissions);
        $adminRole->givePermissionTo($opnPermissions);
        $adminRole->givePermissionTo($schedulePermissions);
        $adminRole->givePermissionTo($scheduleCPermissions);
    }
}
