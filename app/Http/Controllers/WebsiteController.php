<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;

use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;

use DB;

class WebsiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
    }

    public function create()
    {
        $website = new Website;
        
        $client_id = DB::table('websites')->max('id');
        $client_id = $client_id ? $client_id+1 : 1;
        // dd($client_id);
        dump("Please Wait, Domain Creation inprogress!!!");
        
        $website->uuid = "tenancycars_client".$client_id;
        app(WebsiteRepository::class)->create($website);
        // dd($website->uuid); // Unique id

        $hostname = new Hostname;
        $hostname->fqdn = 'client'.$client_id.'.tenancycars.dev1';
        $hostname = app(HostnameRepository::class)->create($hostname);
        app(HostnameRepository::class)->attach($hostname, $website);
        // dd($website->hostnames); // Collection with $hostname
        ;
        echo "
            <br />
            Tenancy Created..
            <br />
            Steps to Follow:
            <br />
            Run: php artisan tenancy:db:seed --website_id={$website->id} <br />
            Configure {$hostname->fqdn} Domain in 'hosts' file [C:\Windows\System32\drivers\etc] <br />
            Run: php artisan serve --host={$hostname->fqdn} <br />
            Same like Create more than one client and try <br />
        ";
        dd("Thank You...");
        // dd($website->uuid, $hostname->fqdn, 'Created, Kindly Configure in your Host File');

    }

}
