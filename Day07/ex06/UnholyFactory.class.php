<?php

    class UnholyFactory
    {
        static $army = array();

        public function absorb($i) {
            if (is_subclass_of($i, 'Fighter')) {
                $name = $i->getName();
                if (!in_array($i, static::$army)) {
                    static::$army[$name] = $i;
                    print"(Factory absorbed a fighter of type $name)\n";
                }
                else {
                    print"(Factory already absorbed a fighter of type $name)\n";
                }
            }
            else {
                print"(Factory can't absorb this, it's not a fighter)\n";
            }
        }

        public function fabricate($rf) {
            if (array_key_exists($rf, static::$army)) {
                print"(Factory fabricates a fighter of type $rf)\n";
                return clone static::$army[$rf];
            }
            else {
                print"(Factory hasn't absorbed any fighter of type $rf)\n";
                return NULL;
            }
        }
    }
?>