<?php

namespace App\Console\Commands;

use App\Author;
use App\News;
use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

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
        $headers = ['Name', 'Email'];
        $users = News::all()->toArray();
      $this->info('SOME TEXT');
      $this->error('SOME TEXT');
      $this->line('SOME TEXT');

        $bar = $this->output->createProgressBar(count($users));

        $bar->start();

        foreach ($users as $user) {
         sleep(1);
            $bar->advance();
        }

        $bar->finish();
    }
}
