<?php

// class AsyncMysql
// {
//     public $db;
    
//     public function __construct($config)
//     {
//         $this->db = new Swoole\MySQL;
//         $this->db->connect($config, function(){
            
//         });
//     }
// }







$db = new Swoole\MySQL;
$server = [
    'host'     => '47.100.161.112',
    'port'     => 3306,
    'user'     => 'root',
    'password' => 'nihao123',
    'database' => 'swoole',
    'charset'  => 'utf8',
    'timeout'  => 2,  // 可选：连接超时时间（非查询超时时间），默认为SW_MYSQL_CONNECT_TIMEOUT（1.0）
];

$db->connect($server, function ($db, $r) {
    try {
        if ($r === false) {
            var_dump($db->connect_errno, $db->connect_error);
            die;
        }
        $sql = 'show tables';
        $db->query($sql, function(swoole_mysql $db, $r) {
            if ($r === false)
            {
                var_dump($db->error, $db->errno);
            }
            elseif ($r === true )
            {
                var_dump($db->affected_rows, $db->insert_id);
            }
            var_dump($r);
            $db->close();
        });
    } catch (Exception $e) {
        echo $e->getFile();echo PHP_EOL;
        echo $e->getMessage();echo PHP_EOL;
        echo $e->getLine();echo PHP_EOL;
        echo $e->getCode();echo PHP_EOL;
        die;
    }
});


echo 'start' . PHP_EOL; 