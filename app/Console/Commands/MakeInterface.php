<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeInterface extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:interface {name : The name of the interface}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new interface in App/Interfaces';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $interfacePath = app_path("Interfaces/{$name}.php");

        // Check if the interface already exists
        if (file_exists($interfacePath)) {
            $this->error("Interface {$name} already exists!");
            return;
        }

        // Interface content
        $content = <<<PHP
        <?php

        namespace App\Interfaces;

        interface {$name}
        {
            //
        }
        PHP;

        // Ensure the directory exists
        (new Filesystem)->ensureDirectoryExists(app_path('Interfaces'));

        // Create the file
        file_put_contents($interfacePath, $content);

        $this->info("Interface {$name} created successfully in App/Interfaces.");
    }
}
