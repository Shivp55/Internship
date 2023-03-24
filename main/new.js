const price = 14340;
console.log(new Intl.NumberFormat().format(price)); 



SELECT * FROM supplier_master JOIN transaction_master ON supplier_master.supplier_master_id = transaction_master.supplier_id LEFT JOIN bank_master ON  transaction_master.bank_id=bank_master.bank_master_id WHERE  date BETWEEN '".$stdt."' AND '".$endt."' and supplier_master_id = $id"