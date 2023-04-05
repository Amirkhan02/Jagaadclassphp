<?php 

class logger {
    public function log($message) {
        echo $message . PHP_EOL;
    }
}

class DataMigrator {
    private $logger;

    public function __construct() {
        $this->logger = new Logger();
    }
    public function migrate() {
        $this->logger1->log('Migrate. Please wait...');
    }
}