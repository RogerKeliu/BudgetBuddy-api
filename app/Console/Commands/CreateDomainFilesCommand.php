<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateDomainFilesCommand extends Command
{
    protected $signature = 'make:create-domain-files {name} {domain}';

    protected $description = 'Create all files to make a full domain work';

    public function handle()
    {
        $name = $this->argument('name');
        $name = $this->argument('domain');

        // Domain

        var_dump(File::allFiles(base_path("Domain/$domain/")));die;

        //Check if path exists, create if not.
        if (!File::exists(base_path("my_framework/Application/$name/controllers"))) {
            File::makeDirectory(base_path("my_framework/Application/$folder/controllers"), 0755, true);
        }

        File::makeDirectory();
    }
}
