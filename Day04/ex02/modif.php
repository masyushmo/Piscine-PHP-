<?PHP
    if ($_POST["login"] && $_POST["oldpw"] && $_POST["newpw"] && $_POST["submit"] === "OK")
    {
        $base = file_get_contents("../private/passwd");
        if ($base)
        {
            $base = unserialize($base);
            foreach ($base as $key => $user)
            {
                if (($user["login"] === $_POST["login"]) && ($user["passwd"] === hash("whirlpool", $_POST["oldpw"])))
                {
                    $base[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
                    $base = serialize($base);
                    file_put_contents('../private/passwd', $base);
                    echo "OK\n";
                    return;
                }
            }
        }
    }
    echo "ERROR\n";
?>