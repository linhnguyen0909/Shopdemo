<?php

namespace App\Console\Commands;

use Goutte\Client;
use Illuminate\Console\Command;

class HealthcheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'healthcheck
                            {url : The URL to check}
                            {status=200 : The expected status code}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description =  'Runs an HTTP healthcheck to verify the endpoint is available';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        parent::__construct();
        $this->client=$client;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $url = $this->getUrl();
            $expected = (int) $this->option('status');
            $crawler = $this->client->request('GET', $url);
            $status = $this->client->getResponse()->getStatus();
        } catch (\Exception $e) {
            $this->error("Healthcheck failed for $url with an exception");
            $this->error($e->getMessage());
            return 2;
        }

        if ($status !== $expected) {
            $this->error("Healthcheck failed for $url with a status of '$status' (expected '$expected')");
            return 1;
        }

        $this->info("Healthcheck passed for $url!");

        return 0;
    }
    private function getUrl()
    {
        $url = $this->argument('url');

        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \Exception("Invalid URL '$url'");
        }

        return $url;
    }
}
