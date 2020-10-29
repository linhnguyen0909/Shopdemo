<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class createTrait extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {traitName : The name of the trait}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trait';

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
        $traitName = $this->argument('traitName').'.php';

        if ($traitName === '' || is_null($traitName) || empty($traitName)) {
            $this->error('Trait Name Invalid..!');
        }
        $fileName = basename($traitName,'.php');
        $filePath = dirname($traitName);
        if (! is_dir('app/Traits/'.$filePath)) {
            mkdir('app/Traits/'.$filePath, 0775, true);
        }
        $filePath = $filePath != '.' ? '\\'.$filePath : null;
        if (! file_exists("app/Traits/".$traitName)) {
            $file = fopen("app/Traits/".$traitName, "w");
            $content = "<?php\n\nnamespace App\\Traits".str_replace('/','\\',$filePath).";\n\n/* \n Trait "
                .$fileName." \n \n @package App\\Traits".str_replace('/','\\',$filePath)."\\".$fileName."\n*/\nTrait ".$fileName."\n{\n\n}";
            fwrite($file, $content);
            fclose($file);
            $this->info('Trait Created Successfully.');
        } else {
            $this->error('Trait '.$traitName.' Already Exists.');
        }
    }
}
