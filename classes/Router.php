<?php

class Router
{
    public string $method;
    public string $module;
    public ?string $id = null;

    public function __construct(){
        $url = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $this->_check($url);

        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->module = $url[2];
        if (isset($url[3])) $this->id = $url[3];
    }

    private function _check(array $url){
        if ($url[1] !== REST_NAME) $this->exit(404);
        if (empty($url[2])) $this->exit(404);
    }

    /**
     * @param int $code - http response code
     * @param array|null $body - body
     * @return void
     */
    public static function exit(int $code = 200, array $body = null){
        $response = [];
        if ($code == 200){
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $response['body'] = json_encode($body);
        } elseif ($code == 201){
            $response['status_code_header'] = 'HTTP/1.1 201 Created';
            $response['body'] = (!empty($body)) ? json_encode($body) : null;
        }elseif ($code == 202){
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $response['body'] = 'Deleted';
        }elseif($code == 400){
            $response['status_code_header'] = 'HTTP/1.1 400 Bad Request';
            $response['body'] = $body;
        }elseif($code == 401){
            $response['status_code_header'] = 'HTTP/1.1 400 Bad Request';
            $response['body'] = $body;
        }elseif ($code == 404) {
            $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
            $response['body'] = '';
        }else Router::exit();

        header($response['status_code_header']);
        if ($response['body']) echo $response['body'];
        exit();
    }
}
    
