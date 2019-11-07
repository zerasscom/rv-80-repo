<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class BackupMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'secure_m {command_call?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $cBackupDb      = 'backup:run --only-db';
        $cBackupMonitor = 'backup:monitor';
        $cMigrate       = 'migrate';

        if (!empty($this->argument('command_call'))) {
            $cMigrate .= ':'.$this->argument('command_call');
        }

        Artisan::call($cBackupDb);
        $commandResult = Artisan::output();

        if (strpos($commandResult, 'Backup completed!') !== false) {
            $this->info('Backup completed!');

            Artisan::call($cBackupMonitor);
            $commandResult = Artisan::output();

            if (strpos($commandResult, 'The backups on local are considered healthy.') !== false &&
                strpos($commandResult, 'The backups on local are considered unhealthy!') == false) {
                $this->info('Backup are considered health');
                Artisan::call($cMigrate);
                $commandResult = Artisan::output();
                dump($commandResult);
            } else {
                $this->error('Error!');
                dump($commandResult);
                $this->error('Error!');
            }
        } else {
            $this->error('Error!');
            dump($commandResult);
            $this->error('Error!');
        }
    }
}
