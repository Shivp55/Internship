<?php


class Admin
{
    function GET_ALL_SUPPLIERS()
    {
        global $db;
        $sql = "SELECT * from supplier_master";
        $result = $db->query($sql);
        $rows = mysqli_num_rows($result);
        return $rows;
    }

    function GET_ALL_ADMIN()
    {
        global $db;
        $sql = "SELECT * FROM admin";
        $result = $db->query($sql);
        $rows = mysqli_num_rows($result);
        return $rows;
    }
    function GET_ALL_INVOICES()
    {
        global $db;
        $sql = "SELECT SUM(amount) as amount from invoice_master";
        $result = $db->query($sql);
        $row = mysqli_fetch_assoc($result);
        $total_amount = $row['amount'];
        return $total_amount;
    }
    function GET_ALL_PAYMENTS()
    {
        global $db;
        $sql = "SELECT SUM(amount) as amount from payment_master";
        $result = $db->query($sql);
        $row = mysqli_fetch_assoc($result);
        $total_amount = $row['amount'];
        return $total_amount;
    }
    function TOTAL_SALES()
    {
        global $db;
        $sql = "SELECT SUM(supplier_master_opening_balance) as op_amount , SUM(supplier_master_current_balance) as cb from supplier_master";
        $result = $db->query($sql);
        $row = mysqli_fetch_assoc($result);
        $op_amount = $row['op_amount'];
        $cb_amount = $row['cb'];

        $sql1 = "SELECT SUM(amount) as amount from invoice_master";
        $result1 = $db->query($sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $total_amount = $row1['amount'];

        $sql2 = "SELECT SUM(amount) as amount from payment_master";
        $result2 = $db->query($sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $total_amount1 = $row['amount'];

        return $op_amount + $total_amount + $total_amount1;
    }
    function TOTAL_BANKS_LINKED()
    {
        global $db;
        $sql = "SELECT * FROM bank_master";
        $result = $db->query($sql);
        $rows = mysqli_num_rows($result);
        return $rows;
    }
    function TOTAL_INVOICES_FOR_MONTH($month)
    {
        global $db;
        if ($month == "Jan") {
            $date = '01-01-2023';
            $date1 = '31-01-2023';
        } else if ($month == "Feb") {
            $date = '01-02-2023';
            $date1 = '28-02-2023';
        } else if ($month == "Mar") {
            $date = '01-03-2023';
            $date1 = '31-03-2023';
        } else if ($month == "Apr") {
            $date = '01-04-2023';
            $date1 = '30-04-2023';
        } else if ($month == "May") {
            $date = '01-05-2023';
            $date1 = '31-05-2023';
        } else if ($month == "June") {
            $date = '01-06-2023';
            $date1 = '30-06-2023';
        } else if ($month == "July") {
            $date = '01-07-2023';
            $date1 = '31-07-2023';
        } else if ($month == "August") {
            $date = '01-08-2023';
            $date1 = '31-08-2023';
        } else if ($month == "Sept") {
            $date = '01-09-2023';
            $date1 = '30-09-2023';
        } else if ($month == "Oct") {
            $date = '01-10-2023';
            $date1 = '31-10-2023';
        } else if ($month == "Nov") {
            $date = '01-11-2023';
            $date1 = '30-11-2023';
        } else if ($month == "Dec") {
            $date = '01-12-2023';
            $date1 = '31-12-2023';
        }
        $date;
        $date1;
        // echo"\n";

        $sql = "SELECT SUM(amount) as amt from invoice_master where invoice_master.date BETWEEN '" . $date . "' and '" . $date1 . "'";
        $result = $db->query($sql);
        $row = mysqli_fetch_assoc($result);
        $total_amount = $row['amt'];
        return $total_amount;
    }
    function GET_TOTAL_INVOICES()
    {
        global $db;
        $sql = "SELECT * FROM invoice_master";
        $result = $db->query($sql);
        $rows = mysqli_num_rows($result);
        return $rows;
    }
    function GET_TOTAL_PAYMENTS()
    {
        global $db;
        $sql = "SELECT * FROM payment_master";
        $result = $db->query($sql);
        $rows = mysqli_num_rows($result);
        return $rows;
    }
    function GET_TOTAL_BANKS()
    {
        global $db;
        $sql = "SELECT * FROM bank_master";
        $result = $db->query($sql);
        $rows = mysqli_num_rows($result);
        return $rows;
    }
    function GET_UPDATES()
    {
        global $db;
        $sql = "SELECT * FROM updates";
        $result = $db->query($sql);
        $rows = mysqli_num_rows($result);
        return $rows;
    }
    function GET_UPDATES_DATA()
    {
        global $db;
        $sql = "SELECT * FROM updates";
        $db->query($sql);
        // $rows = mysqli_num_rows($result);
        return $db->fetch_object();
    }
    function GET_ALL_BALANCEs()
    {
        global $db;
        $sql = "SELECT SUM(supplier_master_current_balance) as current_bal FROM supplier_master ";
        $result2 = $db->query($sql);
        $row = mysqli_fetch_assoc($result2);
        $total_amount1 = $row['current_bal'];
        return $total_amount1;
    }
}
