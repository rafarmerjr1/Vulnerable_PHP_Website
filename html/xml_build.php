<?php
  /*  function make_xml($name,$addr,$email,$item){
       global $xml_file_name;
       $root_dir = getcwd()."/";
       $orders_dir = $root_dir."/resources/orders/";
       $a = scandir($orders_dir);
       global $filecount;
       $filecount = count($a);
       global $filename;
       $filename = $orders_dir.$filecount;
      $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->xmlVersion = '1.0';
        $dom->formatOutput = true;
      $xml_file_name = "$filename.xml";
        $root = $dom->createElement('Order');
        $order_node = $dom->createElement('order');
        $attr_order_id = new DOMAttr('order_num', "$filecount");
        $order_node->setAttributeNode($attr_order_id);
      $child_node_name = $dom->createElement('Name', "$name");
        $order_node->appendChild($child_node_name);
        $child_node_addr = $dom->createElement('Address', "$addr");
        $order_node->appendChild($child_node_addr);
      $child_node_email = $dom->createElement('Email', "$email");
        $order_node->appendChild($child_node_email);
        $child_node_item = $dom->createElement('Item', "$item");
        $order_node->appendChild($child_node_item);
        $root->appendChild($order_node);
        $dom->appendChild($root);
      $dom->save($xml_file_name);
      echo "<p>Your order has been successfully created! Thank you!</p>";
    } */

    function make_xml($name,$addr,$email,$item){
         global $xml_file_name;
         $root_dir = getcwd()."/";
         $orders_dir = $root_dir."/resources/orders/";
         $a = scandir($orders_dir);
         global $filecount;
         $filecount = count($a);
         global $filename;
         $filename = $orders_dir.$filecount.'.xml';
         $data=<<<EOD
         <?xml version="1.0" encoding="utf-8"?>
         <Order>
           <order order_num="$filecount">
             <Name>$name</Name>
             <Address>$addr</Address>
             <Email>$email</Email>
             <Item>$item</Item>
           </order>
         </Order>
         EOD;
         echo $data;
         echo $filename;
         $xml_file_name = fopen($filename,'w');
         echo '1';
         fwrite($xml_file_name, $data);
         echo '2';
         fclose($xml_file_name);
         echo "<p>Your order has been successfully created! Thank you!</p>";
       }



 ?>
