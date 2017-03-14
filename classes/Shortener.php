<?php
class Shortener {
    protected $db;
    
    public function __construct(){
        $this->db = new mysqli(
                    'localhost',
                    'USERNAME',
                    'PASSWORD',
                    'DB_NAME');
    }
    
    public function makeCode($url) {
        $url = trim(strtolower($url));
        
        // Some link shorting
        $url = str_replace("http://www.","http://", $url);
        $url = str_replace("https://www.","https://", $url);
        $url = str_replace("www.","http://", $url);
        
        // link validation
        if(($this->startsWith($url, "http://") == false) AND ($this->startsWith($url, "https://") == false)) {
            return '';
        }
        $url = $this->db->escape_string($url);
        
        // Check if URL already exists
        $exists = $this->db->query("SELECT code FROM shortlinks WHERE url = '{$url}'");
        
        if($exists->num_rows) {
            return $exists->fetch_object()->code;
        }else {
            $this->db->query("INSERT INTO shortlinks (url, created) VALUES ('{$url}', NOW())");
        
            $code = $this->generateCode($this->db->insert_id);
        
            $this->db->query("UPDATE shortlinks SET code = '{$code}' WHERE url = '{$url}'");
            return $code;
        }
    }
    
    public function getUrl($code) {
        $code = $this->db->escape_string($code);
        $code = $this->db->query("SELECT url FROM shortlinks WHERE code = '{$code}'"); 
        
        if($code->num_rows) {
            return $code->fetch_object()->url;
        }
        return '';
    }
    
    protected function generateCode($num) {
        return base_convert($num, 10, 36);
    }
    
    private function startsWith($haystack, $needle) {
        return $needle === "" || strpos($haystack, $needle) === 0;
    }
}
