# Laravel com ElasticSearch

## ElasticSearch
O Elasticsearch é um mecanismo de análise de dados e busca RESTful distribuído, capaz de atender a um número crescente de casos de uso. Como elemento central do Elastic Stack, ele armazena os seus dados centralmente para proporcionar busca rápida, relevância com ajuste fino e analítica poderosa que pode ser ampliada com facilidade.

## Apache Lucene
O Lucene Core é uma biblioteca Java que fornece recursos avançados de indexação e pesquisa, bem como verificação ortográfica, realce de hits e recursos avançados de análise/tokenização

## REST
O Elasticsearch expõe APIs REST que são usadas pelos componentes da interface do usuário e podem ser chamadas diretamente para configurar e acessar os recursos do Elasticsearch.

## Infraestrutura
- Arquitetura Distribuida/Escalonada; Várias instancias em uma rede
- Cluster = Grupo de Instancias do Elasticsearch
- Cluster (Composto de Node/Instancias ES)
  - Node Master (Instancia ES)
  - Node 1 (Instancia ES)
  - Node 2 (Instancia ES)
- Node
  - Shards (Instancia de indice do Apache Lucene)
  - Replicas (Backups)

|Shard      |BD Relacional|
|-----      |-------------|
|Index      |Schema|
|Type       |Tabela|
|Document   |Linha Tabela|

``` json
GET /

return
{
  "name" : "d4c80c6ddb06",
  "cluster_name" : "docker-cluster",
  "cluster_uuid" : "4p3n45lJRPKDUFotfxLdmQ",
  "version" : {
    "number" : "7.7.1",
    "build_flavor" : "default",
    "build_type" : "docker",
    "build_hash" : "ad56dce891c901a492bb1ee393f12dfff473a423",
    "build_date" : "2020-05-28T16:30:01.040088Z",
    "build_snapshot" : false,
    "lucene_version" : "8.5.1",
    "minimum_wire_compatibility_version" : "6.8.0",
    "minimum_index_compatibility_version" : "6.0.0-beta1"
  },
  "tagline" : "You Know, for Search"
}

```

#### API Cat (Dados do Servidor)
``` json
GET _cat/health
---
epoch      |timestamp |cluster        |status |node.total |node.data |shards |pri |relo |init |unassign |pending_tasks |max_task_wait_time |active_shards_percent
1649706565 |19:49:25  |docker-cluster |yellow |1          |1         |5      |5   |0    |0    |1        |0             |-                  |83.3%
```

``` json
GET _cat/indices?v
---
health status index                    uuid                   pri rep docs.count docs.deleted store.size pri.store.size
green  open   .apm-custom-link         SW2Sezt0Tx-XFYAelzf2WQ   1   0          0            0       208b           208b
green  open   .kibana_task_manager_1   rBALdrRCQbOSIgGcc2m0Kw   1   0          5            3     51.4kb         51.4kb
green  open   .apm-agent-configuration lmyb06YOQaeQCu_9JFdE2w   1   0          0            0       208b           208b
yellow open   my_index_php             xEu2nsKdSfWocLQVniOu6g   1   1          1            0      3.6kb          3.6kb
green  open   .kibana_1                q9coErKdRVOWZqdhtWKGlA   1   0         46            2    131.9kb        131.9kb
```

```json
GET _cat/nodes?v
---
ip         heap.percent ram.percent cpu load_1m load_5m load_15m node.role master name
172.22.0.2           39          38   1    0.11    0.15     0.16 dilmrt    *      d4c80c6ddb06
```

#### Criando Indice
```json
PUT clients
---
{
  "acknowledged" : true,
  "shards_acknowledged" : true,
  "index" : "clients"
}
```
#### Excluindo Indice
```json
DELETE clients
---
{
  "acknowledged" : true
}
```

#### Criando Type e Documento
```json
POST son_elastic/clients
{
  "name":"Robson",
  "endereco":"Rua A",
  "numero": 123,
  "data_nasc":"1992-01-15"
}
---
{
  "_index" : "son_elastic",
  "_type" : "clients",
  "_id" : "PoxAGoABpd8KWOuR2Xgb",
  "_version" : 1,
  "result" : "created",
  "_shards" : {
    "total" : 2,
    "successful" : 1,
    "failed" : 0
  },
  "_seq_no" : 0,
  "_primary_term" : 1
}
```

#### Obter Documento
```json
GET son_elastic/clients/_search
---
{
  "took" : 2,
  "timed_out" : false,
  "_shards" : {
    "total" : 1,
    "successful" : 1,
    "skipped" : 0,
    "failed" : 0
  },
  "hits" : {
    "total" : {
      "value" : 1,
      "relation" : "eq"
    },
    "max_score" : 1.0,
    "hits" : [
      {
        "_index" : "son_elastic",
        "_type" : "clients",
        "_id" : "PoxAGoABpd8KWOuR2Xgb",
        "_score" : 1.0,
        "_source" : {
          "name" : "Robson",
          "endereco" : "Rua A",
          "numero" : 123,
          "data_nasc" : "1992-01-15"
        }
      }
    ]
  }
}
```

#### Criando Documento com Identificador
```json
PUT son_elastic/clients/1
{
  "name":"Hugo",
  "endereco":"Rua B",
  "numero": 321,
  "data_nasc":"2019-09-19"
}
---
{
  "_index" : "son_elastic",
  "_type" : "clients",
  "_id" : "1",
  "_version" : 1,
  "result" : "created",
  "_shards" : {
    "total" : 2,
    "successful" : 1,
    "failed" : 0
  },
  "_seq_no" : 1,
  "_primary_term" : 1
}
```


#### Consultar Documento com Identificador
```json
GET son_elastic/clients/1
---
{
  "_index" : "son_elastic",
  "_type" : "clients",
  "_id" : "1",
  "_version" : 1,
  "_seq_no" : 1,
  "_primary_term" : 1,
  "found" : true,
  "_source" : {
    "name" : "Hugo",
    "endereco" : "Rua B",
    "numero" : 321,
    "data_nasc" : "2019-09-19"
  }
}
```

#### Excluir Documento com Identificador
```json
DELETE son_elastic/clients/1
---
{
  "_index" : "son_elastic",
  "_type" : "clients",
  "_id" : "1",
  "_version" : 2,
  "result" : "deleted",
  "_shards" : {
    "total" : 2,
    "successful" : 1,
    "failed" : 0
  },
  "_seq_no" : 2,
  "_primary_term" : 1
}
```