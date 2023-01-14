<?php

require_once __DIR__. '/dbConfig.php';

class API {
    function Select(){
        $db = new Connect;
        $books = [];
        $data = $db->prepare('SELECT * FROM book ORDER BY id');
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $books[$OutputData['id']] = [
                'id' => $OutputData['id'],
                'title' => $OutputData['title'],
                'author' => $OutputData['author'],
                'pages' => $OutputData['pages'],
                'publisher' => $OutputData['publisher'],
                'publicationYear' => $OutputData['publicationYear'],
                'description' => $OutputData['description'],
                'image' => $OutputData['image'],
                'series' => $OutputData['series']
            ];
        }
        return json_encode($books);
    }
}

$API = new API;
header('Content-Type: application/json');
echo $API->Select();

?>