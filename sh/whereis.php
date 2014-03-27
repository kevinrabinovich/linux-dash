<?php 

    exec('whereis php node mysql vim python ruby java apache2 nginx openssl vsftpd make'.
          '|awk \'{ split($1, a, ":");if (length($2)==0) print a[1]",Not Installed"; else print a[1]","$2;}\'',$result);
    
    header('Content-Type: application/json; charset=UTF-8');

    echo "[";
    $x = 0;
    $max = count($result)-1;
    foreach ($result as $a)
    {    
        echo json_encode( explode(',',$result[$x]) );
        echo ($x==$max)?'':',';
        unset($result[$x],$a);
        $x++;
    }
    echo ']';