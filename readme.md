
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

Before running docker compose you have to sure that docker memory size >= 4.0 GB.

Now you have to update composer.json file.

```json

"require": {
        
        "elasticsearch/elasticsearch": "^5.2"
       
    }

```
