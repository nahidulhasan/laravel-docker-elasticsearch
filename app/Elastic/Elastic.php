<?php
namespace App\Elastic;

use Elasticsearch\Client;

class Elastic
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Elastic constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Index a single item
     *
     * @param  array $parameters [index, type, id, body]
     * @return array
     */
    public function index(array $parameters)
    {
        return $this->client->index($parameters);
    }

    /**
     * Delete a single item
     *
     * @param  array $parameters
     * @return array
     */
    public function delete(array $parameters)
    {
        return $this->client->delete($parameters);
    }

    /**
     * Search item in data
     *
     * @param array $parameters
     * @return array
     */
    public function search(array $parameters)
    {
        return $this->client->search($parameters);
    }
}