<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class Inspire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $apiKey = env("TWITTER_API_KEY");
        $apiSecret = env("TWITTER_API_SECRET");

        $encodedKey = urlencode($apiKey);

        $bearerTokenCredentials = $encodedKey . ":" . $apiSecret;

        $base64Credentials = base64_encode($bearerTokenCredentials);
        
        $this->comment($base64Credentials.PHP_EOL);
    }
}
