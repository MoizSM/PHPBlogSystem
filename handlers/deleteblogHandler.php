<?php
    $msg;
    if(isset($_GET['delete'])){
        $itemID = (int)$_GET['delete'];
        $blogItem = new AllBlogs($conn);
        $item = $blogItem->deleteBlogs($itemID);
        $msg = 'POST HAS BEEN DELETED'; 
    }
?>