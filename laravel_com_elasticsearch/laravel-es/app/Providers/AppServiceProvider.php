<?php

namespace App\Providers;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Client::class, function () {
            return ClientBuilder::create()
                ->setHosts([
                    env('ES_HOST', 'http://localhost:9200')
                ])
                ->build();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /** @var CLient $client */
        $client = app(Client::class);
        $index = ['index' => env('ES_INDEX')];
        // var_dump($index);
        //var_dump($client->indices()->exists($index));

        if (!$client->indices()->exists($index)) {
            //echo 'OK---';
            $client->indices()->create($index);
        }
    }
}
