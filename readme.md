
# Laravel-docker-elasticsearch

This is a simple repo for practicing elastic search in laravel with docker.

### What is Elasticsearch?

Elasticsearch is an open-source, RESTful, distributed search and analytics engine built on Apache Lucene. Since the first version of Elasticsearch was released in 2010, it has quickly become the most popular search engine, and is commonly used for log analytics, full-text search, and operational intelligence use cases. 

In this repo you will get how  you will use elastic search in laravel with docker.

First you have to add elastic search image in docker-compose file.

For Example :

```yaml
elasticsearch:
      image: elasticsearch
      ports:
          - "9200:9200"
```

Before running docker compose you have to sure that docker memory size >= 4.0 GB. Otherwise, the elastic search will not run properly.

Now you have to update composer.json file.

```json

"require": {      
        "elasticsearch/elasticsearch": "^5.2"  
    }

```

All the above things I have done in this repo. For running this project just follow the following step:

``` 
clone the repo 
```

From the project directory run the following command:

```
composer update
```

Now increase docker memory size, restart docker and run the following commands

```
docker-compose build

docker-compose up -d
``` 

Now run the migration commmand:

``` 
php artisan migrate
```

Now you can brows the project and create post from this url

```
http://localhost:9000/posts/create
```

Now you can search using elastic search. In app elastic folder you will get elastic class. Here I have implement elastic client.

If you want to add demo data for Post then run the following command:

```sh
docker-compose exec php php artisan tinker

factory(App\Post::class, 50)->create();
```
