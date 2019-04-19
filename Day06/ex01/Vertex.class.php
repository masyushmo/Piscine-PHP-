<?php

    class Vertex
    {
        static $verbose = false;
        private $_x;
        private $_y;
        private $_z;
        private $_w = 1.0;
        private $_color;

        public function __construct($args)
        {
            $this->_x = $args['x'];
            $this->_y = $args['y'];
            $this->_z = $args['z'];
            if (!empty($args['w'])) {

                $this->_w = $args['w'];
            }
            if (!empty($args['color']) && $args['color'] instanceof Color) {
                
                $this->_color = $args['color'];
            }
            else {
                
                $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
            }
            if (static::$verbose) {

                printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n",
                    $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
            }
        }

        public function __destruct()
        {
            if (static::$verbose) {
                
                printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n",
                    $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
            }
        }

        public function __toString()
        {
            if (static::$verbose) {

                $str = sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )",
                    $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
            }
            else {
                $str = sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )",
                $this->_x, $this->_y, $this->_z, $this->_w);
            }   
            return ($str);
        }

        static function doc()
        {
            $fd = fopen("Vertex.doc.txt", 'r');
            while ($fd && !feof($fd)) {

                echo fgets($fd);
            }
        }

        public function getX() {
            
            return $this->_x;
        }

        public function setX($x) {

            $this->_x = $x;
        }

        public function getY() {

            return $this->_y;
        }

        public function setY($y) {

            $this->_y = $y;
        }

        public function getZ() {

            return $this->_z;
        }

        public function setZ($z) {

            $this->_z = $z;
        }

        public function getW() {

            return $this->_w;
        }

        public function setW($w) {

            $this->_w = $w;
        }

        public function getColor() {

            return $this->_color;
        }

        public function setColor($color) {

            $this->_color = $color;
        }
}