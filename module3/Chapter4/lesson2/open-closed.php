<?php

interface Adapter
{
    public function request(string $url): Promise;
}
class AjaxAdapter implements Adapter
{
    public function request(string $url): Promise
    {
        // TODO: Implement request() method.
    }
}
class NodeAdapter implements Adapter
{
    public function request(string $url): Promise
    {
        // request and return promise
    }
}

class HttpRequester
{
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return Adapter
     */
    public function fetch(string $url): promise
    {
        return $this->adapter->request($url);
    }
}
//$httpRequester = new HttpRequester(new HttpWithAuthAdapter());
class HttpWithAuthAdapter extends HttpRequester
{
    public function fetch(string $url): Promise
    {
        if ($this->isAuth()) {
            return $this->adapter->request($url);
        }
    }

    private function isAuth(): bool
    {
        //the rule to check the authentication
        return true;
    }
}