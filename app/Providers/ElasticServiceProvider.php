<?php
namespace App\Providers;

use App\Article;
use App\Elastic\Elastic;
use App\Post;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class ElasticServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $elastic = $this->app->make(Elastic::class);

        Post::saved(function ($post) use ($elastic) {

            $elastic->index([
                'index' => 'blog',
                'type' => 'post',
                'id' => $post->id,
                'body' => $post->toArray()
            ]);
        });

        Post::deleted(function ($post) use ($elastic) {

            $elastic->delete([
                'index' => 'blog',
                'type' => 'post',
                'id' => $post->id,
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Elastic::class, function ($app) {

            return new Elastic(
                ClientBuilder::create()
                    ->setHosts([
                        'elasticsearch:9200'         // IP + Port
                    ])
                    ->setLogger(ClientBuilder::defaultLogger(storage_path('logs/elastic.log')))
                    ->build()
            );
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Elastic::class];
    }


}
