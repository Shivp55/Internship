<?php



echo $name = $_POST['name'];
// echo $op = $_RE['op_form'];

$supplier_obj=new Supplier;
$supplier_data=$supplier_obj->GET_SUPPLIER_BY_NAME($name);
echo $id=$supplier_data->supplier_master_id;





?>