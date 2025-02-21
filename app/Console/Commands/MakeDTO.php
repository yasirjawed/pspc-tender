<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeDTO extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:DTO {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new DTO';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("DTOs/{$name}.php");

        if (file_exists($path)) {
            $this->error('DTO already exists!');
            return;
        }

        (new Filesystem)->ensureDirectoryExists(app_path('DTOs'));

        file_put_contents($path, $this->DTOStub($name));

        $this->info("DTO {$name} created successfully.");
    }

    protected function DTOStub($name)
    {
        return <<<PHP
        <?php

        namespace App\DTOs;

        class {$name}
        {
            public function __construct(
                public readonly array \$data
            ) {}

            public static function fromRequest(array \$data): self
            {
                return new self(\$data);
            }
        }
        PHP;
    }

}
