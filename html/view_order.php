<?php include("header.php"); ?>
<body>
      <?php
      session_start();
      if ($_SESSION['usertype'] == 'admin'){
        //get file
        $root = getcwd();
        $file = $root."/resources/orders/".$_REQUEST['order'];
        $xmlfile = file_get_contents($file);
        //xml transformation
        libxml_disable_entity_loader (false);
        $dom = new DOMDocument();
        $dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
        $order_info = simplexml_import_dom($dom);
        $order_username = $order_info->order->Name;
        $order_addr = $order_info->order->Address;
        $order_email = $order_info->order->Email;
        $order_item = $order_info->order->Item;
        //echo $xmlfile;
        echo "
        <p>
        Name: $order_username <br>
        Address: $order_addr <br>
        Email: $order_email <br>
        Item: $order_item <br>
        </p>
        ";

} else {
     echo'<h4><u> Restricted page. User "webadmin" only.</u></h4>';
}
?>
</body>

<?php include("footer.php");?>
