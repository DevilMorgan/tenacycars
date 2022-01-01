<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Role;
use Hyn\Tenancy\Database\Connection;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Models\Hostname;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:backup {--id=*}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup tenant by id, if --id = all performs full backup';
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
        // To take attention on further changes 
        // vendor\spatie\laravel-backup\src\Tasks\Backup\BackupJob.php -> line 255
        $option = $this->option('id');
        if($option[0] == 'all')
        {
            $this->backupSystem();
            $websites = Website::all();
            foreach ($websites as $website) {
                $this->setupConfigForSite($website);
                $this->callBackupCommand();
            };
            $this->info("You have just performed a backup in all Databases.");
            $this->info("Option used '{$option[0]}'");
        }
        else
            $this->info("Single database backup where id='{$option[0]}'");
    }
    private function backupSystem()
    {
        \Config::set('backup.backup.source.databases', ['system']);
       // \Config::set('backup.backup.name', 'system-backup');
        \Config::set('backup.backup.name', '');
        \Config::set('backup.notifications.mail.to', env('SYSTEM_MASTER_EMAIL', null));
        $this->call('backup:run', ['--only-db']);
    }
    private function setupConfigForSite(Website $website)
    {
        $connection = app(Connection::class);
        $connection->set($website);
        //$email = User::where('id', 1)->firstOrFail()->email;
        $email = User::role('Administrador')->firstOrFail()->email;
        \Config::set('backup.notifications.mail.to', $email);
        \Config::set('backup.backup.source.databases', ['tenant']);
        //$hostName = Hostname::query()->where('website_id', $website->id)->firstOrFail()->fqdn;
        //\Config::set('backup.backup.name', 'tenant-' . $hostName);
        \Config::set('backup.backup.name', '');
        \Config::set('backup.backup.source.files.include', $this->siteIncludes($website));
    }
    
    private function siteIncludes(Website $website)
    {
        return storage_path(env('DATABASES_STORAGE_PATH', 'app/tenancy/tenants/') . $website->uuid);
    }
    private function callBackupCommand()
    {
        $this->call('backup:run');
    }
}
