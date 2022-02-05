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
        //make this a table:
        echo "
        <p>
        <b>Name:</b> $order_username <br>
        <b>Address:</b> $order_addr <br>
        <b>Email:</b> $order_email <br>
        <b>Item:</b> $order_item <br>
        </p>
        ";

} else {
     echo'<h4><u> Restricted page. User "webadmin" only.</u></h4>';
}
?>
</body>

<?php include("footer.php");?>
