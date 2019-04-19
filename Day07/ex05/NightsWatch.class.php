<?php

    class NightsWatch implements IFighter
    {
        static $recr = Array();

        public function recruit($man)
        {
            static::$recr[] = $man;
        }

        public function fight() {
            foreach (static::$recr as $man) {
                $class = get_class($man);
                if (method_exists($class, 'fight')) {
                    $man->fight();
                }
            }
        }
    }
?>