<?PHP
    if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK")
    {
        if (!(file_exists("../private")))
            mkdir("../private");
        if (file_exists("../private/passwd"))
        {
            $base = file_get_contents("../private/passwd");
            $base = unserialize($base);
            foreach ($base as $mass)
            {
                if ($mass["login"] === $_POST["login"])
                {
                    echo "ERROR\n";
                    return;
                }
            }
        }
        $user['login'] = $_POST['login'];
        $user['passwd'] = hash('whirlpool', $_POST['passwd']);
        $base[] = $user;
        $base = serialize($base);
        file_put_contents('../private/passwd', $base);
        echo "OK\n";
    }
    else
        echo "ERROR\n";
?>