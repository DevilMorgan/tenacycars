<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;

class DeleteTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:delete {prefix}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes a tenant with specified prefix. Only available for local development';
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
        if (!app()->isLocal()) {
            $this->error('This command is only available on the local environment.');
            return;
        }
        $prefix = $this->argument('prefix');
        $fqdn = ($prefix=="home"?'':$prefix.'.').config('app.url_base');
        $this->deleteTenant($fqdn);
    }
    private function deleteTenant($fqdn)
    {
        $hostname = Hostname::where('fqdn', $fqdn)->first();
        if(!$hostname){
            $this->error("Tenant {$fqdn} doesn't exist.");
            return;
        }
        else
        {
            app(WebsiteRepository::class)->delete($hostname->website, true);
            app(HostnameRepository::class)->delete($hostname, true);
            $this->info("Tenant {$fqdn} successfully deleted.");
        }
    }
}
