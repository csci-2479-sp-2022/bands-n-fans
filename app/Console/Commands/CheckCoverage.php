<?php

namespace App\Console\Commands;

use App\Exceptions\CoverageException;
use Illuminate\Console\Command;

class CheckCoverage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:coverage {threshold=80}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check code coverage XML report based on threshold';

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
     * @return int
     */
    public function handle()
    {
        $threshold = $this->argument('threshold');

        try {
            $xml = simplexml_load_file(__DIR__ . '/../../../coverage/index.xml');
            $percentage = (float)$xml->project->directory->totals->lines['percent'];
            echo "line coverage: $percentage\n";
            echo "threshold: $threshold\n";

            if (ceil($percentage) < $threshold) {
                throw new CoverageException($threshold);
            }

            return 0;
        } catch (CoverageException $e) {
            echo "{$e->getCoverageMessage($threshold)}\n";

            return 1;
        } catch (\Throwable $e) {
            if (str_contains($e->getMessage(), 'simplexml_load_file')) {
                echo "problem loading coverage file\n";
            } else {
                echo "{$e->getMessage()}\n";
            }

            return 1;
        }
    }
}
