<?php 
    class Patient {
        private $id;
        private $name;
        private $address;

        function __construct($id, $name, $address)
        {
            $this->id = $id;
            $this->name = $name;
            $this->address = $address;
        }

        function get_id() 
        {
            return $this->id;
        }
       
        function get_name() 
        {
            return $this->name;
        }
        
        function get_address() 
        {
            return $this->address;
        }
      
    }

?>