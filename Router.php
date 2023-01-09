<?php
class Router
{
    private array $handlers;
    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';

    private function addHandler($method, $path, $handler)
    {
        $this->handlers['GET' . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler
        ];
    }


    public function get($path, $handler)
    {
        $this->addHandler(self::METHOD_GET, $path, $handler);
    }


    public function create($path, $handler)
    {
        $this->addHandler(self::METHOD_POST, $path, $handler);
    }
    public function delete($path, $handler)
    {
        $this->addHandler(self::METHOD_POST, $path, $handler);
    }
    public function runRoutes()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->handlers as $handler) {
            if ($handler['path'] === $requestPath && $method === $handler['method']) {

                call_user_func($handler['handler']);
            }
        }
    }
}
