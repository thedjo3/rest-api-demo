<?php

class Controller
{
    private string $method;
    private string $module;
    private ?string $id;
//    private $usersObj;

    public function __construct(string $method, string $module, ?string $id){
        $this->method = $method;
        $this->module = $module;
        $this->id = $id;

//        $this->usersObj = new Users();
        // ....
    }

    public function processRequest(){
        $response = ['code' => 200, 'body' => []];
        switch ($this->method){
            case 'GET':
                $response = $this->_get();
                break;
            case 'POST':
                $response = $this->_post();
                break;
            case 'PUT':
                break;
            case 'DELETE':
                break;
            default:
                Router::exit(404);
                break;
        }
        Router::exit($response['code'], $response['body']);
    }

    private function _get(){
        $responseTmp = ['code' => 404, 'body' => []];
        if ($this->id) {
            // method for one object
        }else {
            // methods for all objects
            if ( $this->module == 'cats'){
                $arrayTmp = [
                    [
                        "fact" => "If a cat is frightened, the hair stands up fairly evenly all over the body; when the cat is threatened or is ready to attack, the hair stands up only in a narrow band along the spine and tail.",
                        "length" => 192
                    ],
                    [
                        "fact" =>"Cats lived with soldiers in trenches, where they killed mice during World War I.",
                        "length" => 0
                    ]
                ];
                $responseTmp = ['code' => 200, 'body' => $arrayTmp];

            }elseif ($this->module == 'users') {
                // все едно, че няма намерени потребители:
                $arrayTmp = [];
                $responseTmp = ['code' => 404, 'body' => $arrayTmp];
            }
        }
        return $responseTmp;
    }

    private function _post(){
        // ...
        return ['code' => 201, 'body' => ''];
    }
}
