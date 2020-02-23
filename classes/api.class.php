<?php

namespace Montania;

class Api{

    public $url;

    public function __construct($url){
        $this->url = $url;
    }

    //get a response from the URL
    protected function get_response($url){
        $this->response = file_get_contents($url);
        return $this->response;
    }

    //decode the response to a PHP array
    protected function decode_response($response){
        $this->decoded_object = json_decode($response);
        return $this->decoded_object;
    }

    //get the array with all results from the endpoint
    public function get_all_results(){
        $this->get_response($this->url);
        $this->decode_response($this->response);
    }
}