<?php

    class Vector
    {
        static $verbose = false;
        private $_x;
        private $_y;
        private $_z;
        private $_w;

        public function __construct($args)
        {
            if (!empty($args['dest']) && $args['dest'] instanceof Vertex) {

                $dest = new Vertex( array( 'x' => $args['dest']->getX(),
                    'y' => $args['dest']->getY(), 'z' => $args['dest']->getZ() ) );
                if (!empty($args['orig']) && $args['orig'] instanceof Vertex) {

                    $orig = new Vertex( array( 'x' => $args['orig']->getX(),
                        'y' => $args['orig']->getY(), 'z' => $args['orig']->getZ() ) );
                }
                else {

                    $orig =  new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
                }
                $this->_x = $dest->getX() - $orig->getX();
                $this->_y = $dest->getY() - $orig->getY();
                $this->_z = $dest->getZ() - $orig->getZ();
                $this->_w = 0.0;
            }
            if (static::$verbose) {

                printf("Vector( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f ) constructed\n",
                    $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
            }
        }

        public function __destruct()
        {
            if (static::$verbose) {
                
                printf("Vector( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f ) destructed\n",
                    $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
            }
        }

        public function __toString()
        {
            if (static::$verbose) {

                $str = sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )",
                    $this->_x, $this->_y, $this->_z, $this->_w);
            }   
            return ($str);
        }

        static function doc()
        {
            $fd = fopen("Vector.doc.txt", 'r');
            while ($fd && !feof($fd)) {

                echo fgets($fd);
            }
        }

        public function magnitude() {
            
            return (float)sqrt(($this->_x * $this->_x) +
                ($this->_y * $this->_y) + ($this->_z * $this->_z));
        }

        public function sqwr() {
            
            return (float)(($this->_x * $this->_x) +
                ($this->_y * $this->_y) + ($this->_z * $this->_z));
        }

        public function normalize() {
            
            $len = $this->magnitude();
            if ($len == 1) {

                return clone $this;
            }
            else {
                return new Vector(array('dest' => new Vertex(array('x' => $this->_x / $len,
                    'y' => $this->_y / $len, 'z' => $this->_z / $len))));
            }
        }

        public function add(Vector $rhs) {
            
            return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->_x,
                'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z))));
        }

        public function sub(Vector $rhs) {
            
            return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->_x,
                'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z))));
        }

        public function scalarProduct($k) {
            
            return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k,
                'y' => $this->_y * $k, 'z' => $this->_z * $k))));
        }
        
        public function opposite() {
            
            return new Vector(array('dest' => new Vertex(array('x' => $this->_x * (-1),
                'y' => $this->_y * (-1), 'z' => $this->_z * (-1)))));
        }

        public function dotProduct(Vector $rhs) {
            
            return (float)(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + 
                ($this->_z * $rhs->_z));
        }

        public function cos(Vector $rhs) {
            
            return (float) (($this->dotProduct($rhs) / sqrt(($this->sqwr()) * ($rhs->sqwr()))));
        }

        public function crossProduct(Vector $rhs) {
            
            return new Vector(array('dest' => new Vertex(array('x' => (($this->_y * $rhs->_z) - ($this->_z * $rhs->_y)),
                'y' => (($this->_x * $rhs->_z) - ($this->_z * $rhs->_x)),
                    'z' => (($this->_x * $rhs->_y) - ($this->_y * $rhs->_x))))));
        }

        public function getX() {
            
            return $this->_x;
        }

        public function getY() {

            return $this->_y;
        }

       public function getZ() {

            return $this->_z;
        }

        public function getW() {

            return $this->_w;
        }
}