<?php
    function auth($login, $passwd)
    {
        $base = file_get_contents("../private/passwd");
        $base = unserialize($base);
        if ($base)
        {
            foreach ($base as $user)
                if ($user['login'] === $login && $user['passwd'] === hash('whirlpool', $passwd))
                    return TRUE;
        }
        return FALSE;
    }
?>