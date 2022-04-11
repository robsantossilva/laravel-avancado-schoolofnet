<?php
require 'vendor/autoload.php';

$client = Elasticsearch\ClientBuilder::create()
    ->setHosts([
        'http://localhost:9200'
    ])
    ->build();

# Indexing a documento
// $params = [
//     'index' => 'my_index_php',
//     'id'    => 'my_id_php',
//     'body'  => ['testField' => 'robson']
// ];

// $response = $client->index($params);
// print_r($response);

#GET a document
// $params = [
//     'index' => 'my_index_php',
//     'id'    => 'my_id_php'
// ];

// $response = $client->get($params);
// print_r($response);

#Seraching for a document
// $params = [
//     'index' => 'my_index_php',
//     'body'  => [
//         'query' => [
//             'match' => [
//                 'testField' => 'robson'
//             ]
//         ]
//     ]
// ];
// $response = $client->search($params);
// print_r($response);

#Deleting a documento
// $params = [
//     'index' => 'my_index_php',
//     'id'    => 'my_id_php'
// ];
// $response = $client->delete($params);
// print_r($response);
