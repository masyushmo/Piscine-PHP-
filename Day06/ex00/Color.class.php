<?php
    class Color {

        static $verbose = false;
        public $red;
        public $green;
        public $blue;

        public function __construct($color)
        {
            if (array_key_exists('rgb', $color)){

                $this->red = (($color['rgb']) >> 16) % 256;
                $this->green = (($color['rgb']) >> 8) % 256;
                $this->blue = ($color['rgb']) % 256;
            }
            elseif (array_key_exists('red', $color) && array_key_exists('green', $color) &&
                array_key_exists('blue', $color)) {

                $this->red = intval($color['red']);
                $this->green = intval($color['green']);
                $this->blue = intval($color['blue']);
            }
            if (static::$verbose) {

                printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n",
                    $this->red, $this->green, $this->blue);
            }
        }

        public function __destruct()
        {
            if (static::$verbose) {

                printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n",
                    $this->red, $this->green, $this->blue);
            }
        }

        public function __toString() {
            $str = sprintf("Color( red: %3d, green: %3d, blue: %3d )",
                $this->red, $this->green, $this->blue);
            return ($str);
        }

        static function doc() {

            $fd = fopen("Color.doc.txt", 'r');
            while ($fd && !feof($fd)) {

                echo fgets($fd);
            }            
        }

        public function add($color) {

            return (new Color(array('red' => $this->red + $color->red, 'green' => $this->green + $color->green, 'blue' => $this->blue + $color->blue)));
        }

        public function sub($color) {

            return (new Color(array('red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $this->blue - $color->blue)));
        }

        public function mult($color) {

            return (new Color(array('red' => $this->red * $color, 'green' => $this->green * $color, 'blue' => $this->blue * $color)));
        }
    }
?>