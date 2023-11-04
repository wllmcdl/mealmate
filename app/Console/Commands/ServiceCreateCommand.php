<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ServiceCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    public function handle(): void
    {
        $name = $this->argument('name');
        $servicePath = app_path('Services/'.$name.'.php');

        if (File::exists($servicePath)) {
            $this->error('Service already exists!');

            return;
        }

        File::put($servicePath, '<?php namespace App\Services; class '.$name.' {  }');

        $this->info('Service created successfully!');
    }
}
