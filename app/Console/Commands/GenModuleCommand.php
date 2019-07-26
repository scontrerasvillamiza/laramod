<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class GenModuleCommand extends Command
{
    protected $signature = 'gen:module {module}';

    protected $description = 'Generate a conventional module';

    public function handle()
    {
        $fs = new Filesystem();

        $module = $this->argument('module');

        $root_path = $this->laravel['path.base'];

        $modulePath = $root_path . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . $module;

        $controllersPath = $modulePath . DIRECTORY_SEPARATOR . 'Controllers';

        $viewsPath = $modulePath . DIRECTORY_SEPARATOR . 'Views';

        $modelsPath = $modulePath . DIRECTORY_SEPARATOR . 'Models';

        $langPath = $modulePath . DIRECTORY_SEPARATOR . 'Lang' . DIRECTORY_SEPARATOR . 'en';

        $routesFile = $modulePath . DIRECTORY_SEPARATOR . 'routes.php';

        $this->info("Start generating the module '$module'");

        $this->createDirectory($fs, $modulePath);

        $this->createDirectory($fs, $controllersPath);

        $this->createDirectory($fs, $viewsPath);

        $this->createDirectory($fs, $modelsPath);

        $this->createDirectory($fs, $langPath);

        $fs->put($routesFile, "<?php" . PHP_EOL);

        $this->info("File '$routesFile' was created.");
    }

    protected function createDirectory(Filesystem $fs, $dir)
    {
        if ($fs->makeDirectory($dir, 0755, true)) {
            $this->info("Folder '$dir' was created.");
        } else {
            $this->error("Unable to create folder '$dir'.");
        }
    }
}
