<?php
require '../includes/config.php';
header('Content-type: application/json');
$id = $_POST['id'];
$date=$_POST['date'];
$supplier_obj=new Supplier;
$sup_data=  $supplier_obj->GET_SUPPLIER_BY_ID($id);
$opening_balance= $sup_data->supplier_master_opening_balance;

            $dates = explode("-", $date);

            $start_date = date("Y-m-d", strtotime($dates[0]));
            $end_date = date("Y-m-d", strtotime($dates[1]));

            
            $data_obj=new Transaction;
            $data =  $data_obj->GET_TRANSACTION_BY_ID($id,$start_date,$end_date);
            $debit_balance =  $data_obj->FETCH_TOTAL_FOR_TYPE($id,1);
            $credit_balance =  $data_obj->FETCH_TOTAL_FOR_TYPE($id,2);

            $dataArray = array();
            $record=array();
            $record["date"] = "";
            $record["invoice"] = "";
            $record["bank"] = "";
            $record["debit"] = "";
            $record["credit"] = "Opening Balance";
            $record["balance"] = number_format($opening_balance, 2, ".", ",");
            array_push($dataArray, $record);

            foreach ($data as $val) {

                $record = array();

                $record["date"] = $val->create_on ;
                if ($val->trans_type == 2) {
                    $record["invoice"] = $val->invoice_no;
                }
                else{
                    $record["invoice"]="";
                }
                if($val->bank_id>0){
                $record["bank"] = $val->bank_master_name;
                }
                else{
                    $record["bank"]="NA";
                }

                if ($val->trans_type == 1) {
                    $record["debit"] = number_format($val->trans_amnt, 2, ".", ",");
                    $opening_balance = $opening_balance - $val->trans_amnt;
                } else {
                    $record["debit"] = "";
                }


                if ($val->trans_type == 2) {
                    $record["credit"] = number_format($val->trans_amnt, 2, ".", ",");
                    $opening_balance = $opening_balance + $val->trans_amnt;
                } else {
                    $record["credit"] = "";
                }
                
                $record["balance"] = number_format($opening_balance, 2, ".", ",");

                array_push($dataArray, $record);
            }
            
            $record1=array();
            $record1["date"] = "";
            $record1["invoice"] = "";
            $record1["bank"] = "";
            $record1["debit"] = "";
            $record1["credit"] = "closing Balance";
            $record1["balance"] = number_format($opening_balance, 2, ".", ",");
            array_push($dataArray, $record1);
            echo json_encode($dataArray);
