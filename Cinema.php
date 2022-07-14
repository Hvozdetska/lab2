<?php

use MongoDB\BSON\UTCDateTime;

require_once __DIR__."/vendor/autoload.php";

class Cinema
{
    private $films;

    public function __construct()
    {
        $client = new \MongoDB\Client("mongodb://127.0.0.1/");
        $this->films = $client->cinema->films;
    }

    public function video(): void
    {
        $statement = $this->films->distinct("title", ["carrier"=>"видеокассета"]);
        echo "<div id='contentSave'>Films:<br>";
        foreach ($statement as $data) {
            echo "$data;<br>";
        }
        echo "</div>";
    }

    public function filmByActor($actor): void
    {
        $statement = $this->films->find(["actors"=>['$in' => [$actor]]]);
        echo "<div id='contentSave'> Films (actor-$actor):<br>";
        foreach ($statement as $data) {
            echo $data["title"]."<br>";
        }
        echo "</div>";
    }

    public function newFilm(): void
    {
        $date = new UTCDateTime(strtotime(date("Y-01-01")) * 1000);
        $statement = $this->films->find(["year"=>['$gt' => $date]]);
        echo "<div id='contentSave'> New Films:<br>";
        foreach ($statement as $data) {
            echo $data["title"]."<br>";
        }
        echo "</div>";
    }
}