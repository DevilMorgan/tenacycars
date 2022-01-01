<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;

class CreateTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:create {prefix} {name} {email} {password}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new tenant with prefix and a admin user.';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $prefix = $this->argument('prefix');
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');
        $fqdn = ($prefix=="home"?'':$prefix.'.').config('app.url_base');
        if ($this->tenantExists($fqdn)) {
            $this->error("A tenant with prefix '{$prefix}' already exists.");
            return;
        }
        else
        {
            $hostname = $this->registerTenant($fqdn);
            app(Environment::class)->tenant($hostname->website);
            $this->addTenant($name, $email, $password);
            $this->info("Tenant '{$prefix}' is created and is now accessible at {$hostname->fqdn}");
        }
    }
    private function tenantExists($fqdn)
    {
        return Hostname::where('fqdn', $fqdn)->exists();
    }
    private function registerTenant($fqdn)
    {
        $website = new Website;
        app(WebsiteRepository::class)->create($website);
        $hostname = new Hostname;
        $hostname->fqdn = $fqdn;
        app(HostnameRepository::class)->attach($hostname, $website);
        return $hostname;
    }
    private function addTenant($name, $email, $password)
    {
        $tenant = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        //$tenant->guard_name = 'web';
        $tenant->assignRole('Administrador');
        return $tenant;
    }
}
