<?php 
    // include 'lib_db.php';
    include 'lib_db.php';
    include 'connect.php';
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
        if ($id<  1) return ;

    $sql = " SELECT * FROM chuyenmuc ";  
    $se = mysqli_query($conn,$sql);
    $d =mysqli_num_rows($se);
    // print_r($d).exit();
    for( $i = 1; $i <= $d; $i++ ){
        echo "<br>";
        $sql = " SELECT * FROM chuyenmuc WHERE id = $i";
        print_r(select_one($sql)['name']);
        echo "<br>" ;
        $sq = " SELECT * FROM trangchu WHERE cid = $i";
        $sdem = mysqli_query($conn,$sq);
        $in = select_list($sq);
        $dem =mysqli_num_rows($sdem);
        // print_r($dem);
        for ( $j = 0; $j < $dem; $j++ ){
            $pr = $in[$j];
            echo "--" ;print_r($pr['cardname']);echo "<br>";
            // var_dump($sdem);
        }
    }

    $sql = " SELECT * FROM trangchu WHERE cid=$id";
    // print_r($sql).exit();
    $result = select_list($sql);
    // print_r($result).exit();
?>