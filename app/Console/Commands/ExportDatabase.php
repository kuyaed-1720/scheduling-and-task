<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExportDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:export'; // app:export-database

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export the database to an SQL file';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = 'scheduling_and_task.sql';
        $path = storage_path('app/' . $filename);

        $command = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " --port=4433 " . env('DB_DATABASE') . " > " . $path;

        $returnVar = null;
        $output = null;

        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            $this->error('Failed to export database.');
        } else {
            $this->info('Database exported successfully to ' . $path);
        }

    }
}
