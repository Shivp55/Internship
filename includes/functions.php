<?php

function InsertData($arr, $table) {
    global $db;
    foreach ($arr as $field => $value) {
        $fields[] = '`' . $field . '`';
        $values[] = "'" . mysqli_real_escape_string($db->link_id(),$value) . "'";
    }
    $field_list = join(',', $fields);
    $value_list = join(', ', $values);

    $query = $db->query("INSERT INTO `" . $table . "` (" . $field_list . ") VALUES (" . $value_list . ")");
    return $query;
}

function ImportData($arr, $table) {
    global $db;
    foreach ($arr as $field => $value) {
        $fields[] = '`' . $field . '`';
        $values[] = "'" . mysqli_real_escape_string($db->link_id(),$value) . "'";
    }
    $field_list = join(',', $fields);
    $value_list = join(', ', $values);

    $query = $db->query("INSERT INTO `" . $table . "` (" . $field_list . ") VALUES (" . $value_list . ")");
   $sql = "Select LAST_INSERT_ID() as lid";
        $db->query($sql);
        return $db->fetch_object();
}

function InsertDataGlobal($arr, $table) {
    global $dbs;
    foreach ($arr as $field => $value) {
        $fields[] = '`' . $field . '`';
        $values[] = "'" . mysqli_real_escape_string($dbs->link_id(),$value) . "'";
    }
    $field_list = join(',', $fields);
    $value_list = join(', ', $values);

    $query = $dbs->query("INSERT INTO `" . $table . "` (" . $field_list . ") VALUES (" . $value_list . ")");
    return $query;
}

function UpdateData($arr, $table, $where_arr) {
    global $db;
    foreach ($arr as $field => $value) {
        $fields[] = "`" . $field . "`  =  '" . mysqli_real_escape_string($db->link_id(),$value) . "'";
    }
    $field_list = join(',', $fields);

    foreach ($where_arr as $condi_id => $value) {
        $conditions[] = "`" . $condi_id . "`  =  '" . mysqli_real_escape_string($db->link_id(),$value) . "'";
    }
    $conditions = join(' AND ', $conditions);

    $appendquery = '';
    if (!empty($conditions))
        $appendquery = " AND " . $conditions;

    $query = $db->query("UPDATE `" . $table . "` SET " . $field_list . " WHERE 1  " . $appendquery);
    return $query;
}

function ImportUpdateData($arr, $table,$where_arr) {
    global $db;
    foreach ($arr as $field => $value) {
        $fields[] = '`' . $field . '`';
        $values[] = "'" . mysqli_real_escape_string($db->link_id(),$value) . "'";
    }
    $field_list = join(',', $fields);
    foreach ($where_arr as $condi_id => $value) {
        $conditions[] = "`" . $condi_id . "`  =  '" . mysqli_real_escape_string($db->link_id(),$value) . "'";
    }
    $conditions = join(' AND ', $conditions);

    $appendquery = '';
    if (!empty($conditions))
        $appendquery = " AND " . $conditions;

    $query = $db->query("UPDATE `" . $table . "` SET " . $field_list . " WHERE 1  " . $appendquery);
    return $query;
}


function xml2array($xml) {
    $arXML = array();
    $arXML['name'] = trim($xml->getName());
    $arXML['value'] = trim((string) $xml);
    $t = array();
    foreach ($xml->attributes() as $name => $value) {
        $t[$name] = trim($value);
    }
    $arXML['attr'] = $t;
    $t = array();
    foreach ($xml->children() as $name => $xmlchild) {
        $t[$name][] = xml2array($xmlchild); //FIX : For multivalued node
    }
    $arXML['children'] = $t;
    return($arXML);
}


// Get data from given URL using CURL
function get_data($url) {
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}


// Create select box option list with given array
function fillArrayCombo($arr, $val) {
    $combo = '';
    foreach ($arr as $key => $value) {
        if ($key == $val)
            $combo .= '<option selected  value="' . $key . '">' . $value . '</option>';
        else
            $combo .= '<option value="' . $key . '">' . $value . '</option>';
    }
    return $combo;
}

// Print array 
function printarr($arr) {
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

// Get current page name with extention
function getCurrPageName() {
    $currentFile = $_SERVER["PHP_SELF"];
    $parts = Explode('/', $currentFile);
    $currpage = $parts[count($parts) - 1];
    return $currpage;
}

// Get current page name only without extention
function getCurrPageName_Only() {
    $currentFile = basename($_SERVER["PHP_SELF"], ".php");
    return $currentFile;
}

// Generate random password 
function generatePassword($length = 8) {
    // start with a blank password
    $password = "";
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
    $maxlength = strlen($possible);

    if ($length > $maxlength) {
        $length = $maxlength;
    }
    $i = 0;
    while ($i < $length) {
        $char = substr($possible, mt_rand(0, $maxlength - 1), 1);
        if (!strstr($password, $char)) {
            $password .= $char;
            $i++;
        }
    }
    return $password;
}

function sortArray($arr, $field) {
    $sort_price = array();
    foreach ($arr as $key => $val) {
        $sort_price[$key] = $val[$field];
    }
    array_multisort($sort_price, SORT_ASC, $arr);
    return $arr;
}

function CreateLog($file, $content) {

    //== Create Main Folder
    $directory = date("mY");
    if (!file_exists(LOG_PATH . $directory)) {
        mkdir(LOG_PATH . $directory, 0777, true);
    }

    //== Create Sub Folder
    $subdirectory = date("dmY");

    if (!file_exists(LOG_PATH . $directory . "/" . $subdirectory)) {
        mkdir(LOG_PATH . $directory . "/" . $subdirectory, 0777, true);
    }

    //=== Create A File
    $file_name = LOG_PATH . $directory . "/" . $subdirectory . "/" . $file;


    $fp = fopen($file_name, 'w');
    fwrite($fp, $content);
}

function getFillCombo($query, $field1, $field2, $field3 = "", $val = "") {

    global $db;

    $sql = $db->query($query);
    $country_row = $db->fetch_object();
    $total_count = $db->num_rows();


    $combo = '';
    if ($total_count > 0) {
        foreach ($country_row as $rows) {
            if ($field3 != "") {
                if ($rows->$field1 == $val)
                    $combo .= '<option data-image="' . IMAGE_URL . 'flags/' . $rows->flag . '" selected  value="' . $rows->$field1 . '">' . $rows->$field2 . " - " . $rows->$field3 . '</option>';
                else
                    $combo .= '<option data-image="' . IMAGE_URL . 'flags/' . $rows->flag . '" value="' . $rows->$field1 . '">' . $rows->$field2 . " - " . $rows->$field3 . '</option>';
            }
            else {
                if ($rows->$field1 == $val)
                    $combo .= '<option data-image="' . IMAGE_URL . 'flags/' . $rows->flag . '" selected  value="' . $rows->$field1 . '">' . $rows->$field2 . '</option>';
                else
                    $combo .= '<option data-image="' . IMAGE_URL . 'flags/' . $rows->flag . '" value="' . $rows->$field1 . '">' . $rows->$field2 . '</option>';
            }
        }
    }
    return $combo;
}

function generate_pagination($num_items, $per_page, $start_item, $add_prevnext_text = TRUE) {

    global $lang;


    $path_parts = pathinfo($_SERVER['SCRIPT_FILENAME']);

    $base_url = $path_parts["basename"] . "?" . substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'], "&start") === false ? strlen($_SERVER['QUERY_STRING']) : strpos($_SERVER['QUERY_STRING'], "&start"));

    $total_pages = ceil($num_items / $per_page);



    if ($total_pages == 1)
        return '';



    $on_page = floor($start_item / $per_page) + 1;

    $page_string = '';

    if ($total_pages > 10) {

        $init_page_max = ( $total_pages > 3 ) ? 3 : $total_pages;

        for ($i = 1; $i < $init_page_max + 1; $i++) {

            $page_string .= ( $i == $on_page ) ? '<a class="activePage" href="#">' . $i . '</a>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) . '\';document.forms[0].submit();" >' . $i . '</a>';

            if ($i < $init_page_max)
                $page_string .= ' ';
        }



        if ($on_page > 1 && $on_page < $total_pages) {

            $page_string .= ( $on_page > 5 ) ? ' ... ' : ', ';

            $init_page_min = ( $on_page > 4 ) ? $on_page : 5;

            $init_page_max = ( $on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;



            for ($i = $init_page_min - 1; $i < $init_page_max + 2; $i++) {

                $page_string .= ($i == $on_page) ? '<a class="activePage" href="#">' . $i . '</a>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) . '\'; document.forms[0].submit();">' . $i . '</a>';

                if ($i < $init_page_max + 1)
                    $page_string .= ' ';
            }

            $page_string .= ( $on_page < $total_pages - 4 ) ? ' ... ' : ', ';
        }
        else
            $page_string .= ' ... ';



        for ($i = $total_pages - 2; $i < $total_pages + 1; $i++) {

            $page_string .= ( $i == $on_page ) ? '<a class="activePage" href="#">' . $i . '</a>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) . '\';document.forms[0].submit();">' . $i . '</a>';

            if ($i < $total_pages)
                $page_string .= " ";
        }
    }

    else {

        for ($i = 1; $i < $total_pages + 1; $i++) {

            $page_string .= ( $i == $on_page ) ? '<a class="activePage" href="#">' . $i . '</a>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) . '\';document.forms[0].submit();">' . $i . '</a>';

            if ($i < $total_pages)
                $page_string .= " ";
        }
    }



    if ($add_prevnext_text) {

        if ($on_page > 1)
            $page_string = ' <a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $on_page - 2 ) * $per_page ) . '\'; document.forms[0].submit();">' . "Previous" . '</a>&nbsp;&nbsp;' . $page_string;
        else
            $page_string = '<span class="prev">Previous</span>' . $page_string;



        if ($on_page < $total_pages)
            $page_string .= '&nbsp;&nbsp;<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( $on_page * $per_page ) . '\';document.forms[0].submit();">' . "Next" . '</a>';
        else
            $page_string .= '<span class="next">Next</span>';
    }



    return $page_string;
}



function generate_pagination1($num_items, $per_page, $start_item, $add_prevnext_text = FALSE) {

    global $lang;


    $path_parts = pathinfo($_SERVER['SCRIPT_FILENAME']);

    $base_url = $path_parts["basename"] . "?" . substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'], "&start") === false ? strlen($_SERVER['QUERY_STRING']) : strpos($_SERVER['QUERY_STRING'], "&start"));

    $total_pages = ceil($num_items / $per_page);



    if ($total_pages == 1)
        return '';



    $on_page = floor($start_item / $per_page) + 1;

    $page_string = '';

    if ($total_pages > 10) {

        $init_page_max = ( $total_pages > 3 ) ? 3 : $total_pages;

        for ($i = 1; $i < $init_page_max + 1; $i++) {

            $page_string .= ( $i == $on_page ) ? '<a class="currentStep" href="javascript:void(0);">' . $i . '</a>' : '<a class=step href="javascript:void(0);" onclick="javascript:Pagination('.(($i-1)*$per_page).');" >' . $i . '</a>';

            if ($i < $init_page_max)
                $page_string .= ' ';
        }



        if ($on_page > 1 && $on_page < $total_pages) {

            $page_string .= ( $on_page > 5 ) ? ' ... ' : ', ';

            $init_page_min = ( $on_page > 4 ) ? $on_page : 5;

            $init_page_max = ( $on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;



            for ($i = $init_page_min - 1; $i < $init_page_max + 2; $i++) {

                $page_string .= ($i == $on_page) ? '<a class="currentStep" href="javascript:void(0);">' . $i . '</a>' : '<a class=step href="javascript:void(0);" onclick="javascript:Pagination('.(($i-1)*$per_page).');">' . $i . '</a>';

                if ($i < $init_page_max + 1)
                    $page_string .= ' ';
            }

            $page_string .= ( $on_page < $total_pages - 4 ) ? ' ... ' : ', ';
        }
        else
            $page_string .= ' ... ';



        for ($i = $total_pages - 2; $i < $total_pages + 1; $i++) {

            $page_string .= ( $i == $on_page ) ? '<a class="currentStep" href="javascript:void(0);">' . $i . '</a>' : '<a class=step href="javascript:void(0);" onclick="javascript:Pagination('.(($i-1)*$per_page).');">' . $i . '</a>';

            if ($i < $total_pages)
                $page_string .= " ";
        }
    }

    else {

        for ($i = 1; $i < $total_pages + 1; $i++) {

            $page_string .= ( $i == $on_page ) ? '<a class="currentStep" href="javascript:void(0);">' . $i . '</a>' : '<a class=step href="javascript:void(0);" onclick="javascript:Pagination('.(($i-1)*$per_page).');">' . $i . '</a>';

            if ($i < $total_pages)
                $page_string .= " ";
        }
    }



    if ($add_prevnext_text) {

        if ($on_page > 1)
            $page_string = ' <a class="step prevLink" href="javascript:void(0);" onclick="javascript:Pagination('.(( $on_page - 2 ) * $per_page ).');">' . "Previous" . '</a>&nbsp;&nbsp;' . $page_string;
        else
            $page_string = '<span class="step prevLink">Previous</span>' . $page_string;



        if ($on_page < $total_pages)
            $page_string .= '&nbsp;&nbsp;<a href="javascript:void(0);" class="step nextLink" onclick="javascript:Pagination('.( $on_page * $per_page ).');">' . "Next" . '</a>';
        else
            $page_string .= '<span class="step nextLink">Next</span>';
    }



    return $page_string;
}


function user_generate_pagination($num_items, $per_page, $start_item, $add_prevnext_text = FALSE) {

    global $lang;


    $path_parts = pathinfo($_SERVER['SCRIPT_FILENAME']);

    $base_url = $path_parts["basename"] . "?" . substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'], "&start") === false ? strlen($_SERVER['QUERY_STRING']) : strpos($_SERVER['QUERY_STRING'], "&start"));

    $total_pages = ceil($num_items / $per_page);



    if ($total_pages == 1)
        return '';



    $on_page = floor($start_item / $per_page) + 1;

    $page_string = '';

    if ($total_pages > 10) {

        $init_page_max = ( $total_pages > 3 ) ? 3 : $total_pages;

        for ($i = 1; $i < $init_page_max + 1; $i++) {

            $page_string .= ( $i == $on_page ) ? '<a class="currentStep" href="javascript:void(0);">' . $i . '</a>' : '<a class=step href="javascript:void(0);" onclick="javascript:Pagination('.(($i-1)*$per_page).');" >' . $i . '</a>';

            if ($i < $init_page_max)
                $page_string .= ' ';
        }



        if ($on_page > 1 && $on_page < $total_pages) {

            $page_string .= ( $on_page > 5 ) ? ' ... ' : ', ';

            $init_page_min = ( $on_page > 4 ) ? $on_page : 5;

            $init_page_max = ( $on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;



            for ($i = $init_page_min - 1; $i < $init_page_max + 2; $i++) {

                $page_string .= ($i == $on_page) ? '<a class="currentStep" href="javascript:void(0);">' . $i . '</a>' : '<a class=step href="javascript:void(0);" onclick="javascript:Pagination('.(($i-1)*$per_page).');">' . $i . '</a>';

                if ($i < $init_page_max + 1)
                    $page_string .= ' ';
            }

            $page_string .= ( $on_page < $total_pages - 4 ) ? ' ... ' : ', ';
        }
        else
            $page_string .= ' ... ';



        for ($i = $total_pages - 2; $i < $total_pages + 1; $i++) {

            $page_string .= ( $i == $on_page ) ? '<a class="currentStep" href="javascript:void(0);">' . $i . '</a> |' : '<a class=step href="javascript:void(0);" onclick="javascript:Pagination('.(($i-1)*$per_page).');">' . $i . '</a> |';

            if ($i < $total_pages)
                $page_string .= " ";
        }
    }

    else {

        for ($i = 1; $i < $total_pages + 1; $i++) {

            $page_string .= ( $i == $on_page ) ? '<a class="currentStep" href="javascript:void(0);">' . $i . '</a> |' : '<a class=step href="javascript:void(0);" onclick="javascript:Pagination('.(($i-1)*$per_page).');">' . $i . '</a> |';

            if ($i < $total_pages)
                $page_string .= " ";
        }
    }



    return $page_string;
}


function pagination1($total, $per_page, $page, $add_prevnext_text = TRUE) {
    
    $path_parts = pathinfo($_SERVER['SCRIPT_FILENAME']);
    $page_name = $path_parts["basename"] . "?" . substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'], "&start") === false ? strlen($_SERVER['QUERY_STRING']) : strpos($_SERVER['QUERY_STRING'], "&start"));
    //$total_pages = ceil($total / $per_page);

    $adjacents = "2";

    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;

    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total / $per_page);

    $lpm1 = $lastpage - 1;

    $pagination = "";

    if ($lastpage > 1) {
        $pagination .= "<ul class='pagination'>";

        if ($page > 1) {
            $pagination .= "<li><a onclick='javascript:Pagination(1);' href='javascript:void(0);'>First</a></li>";
            $pagination .= "<li><a onclick='javascript:Pagination($prev);' href='javascript:void(0);'>Prev</a></li>";
        }
        if ($lastpage < 7 + ($adjacents * 2)) {
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page){
                    $pagination.= "<li><a class='current'>$counter</a></li>";
                }
                else{
                    $pagination.= "<li><a onclick='javascript:Pagination(($counter-1)*$per_page);' href='javascript:void(0);'>$counter</a></li>";
                }
            }
        }
        elseif ($lastpage > 5 + ($adjacents * 2)) {
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page){
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    }
                    else {
                        $pagination.= "<li><a onclick='javascript:Pagination(($counter-1)*$per_page);' href='javascript:void(0);'>$counter</a></li>";
                    }
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a onclick='javascript:Pagination($lpm1);' href='javascript:void(0);'>$lpm1</a></li>";
                $pagination.= "<li><a onclick='javascript:Pagination($lastpage);' href='javascript:void(0);'>$lastpage</a></li>";
            }
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination.= "<li><a onclick='javascript:Pagination(1);' href='javascript:void(0);'>1</a></li>";
                $pagination.= "<li><a onclick='javascript:Pagination(2);' href='javascript:void(0);'>2</a></li>";


                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page){
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    }
                    else {
                        $pagination.= "<li><a onclick='javascript:Pagination(($counter-1)*$per_page);' href='javascript:void(0);'>$counter</a></li>";
                    }
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a onclick='javascript:Pagination($lpm1);' href='javascript:void(0);'>$lpm1</a></li>";
                $pagination.= "<li><a onclick='javascript:Pagination($lastpage);' href='javascript:void(0);'>$lastpage</a></li>";
            }
            else {
                $pagination.= "<li><a onclick='javascript:Pagination(1);' href='javascript:void(0);'>1</a></li>";
                $pagination.= "<li><a onclick='javascript:Pagination(2);' href='javascript:void(0);'>2</a></li>";

                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page){
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    }
                    else {
                        $pagination.= "<li><a onclick='javascript:Pagination(($counter-1)*$per_page);' href='javascript:void(0);'>$counter</a></li>";
                    }
                }
            }
        }

        if ($page < $counter - 1) {
            $pagination.= "<li><a onclick='javascript:Pagination($next);' href='javascript:void(0);'>Next</a></li>";
            $pagination.= "<li><a onclick='javascript:Pagination($lastpage);' href='javascript:void(0);'>Last</a></li>";
        }
        $pagination.= "</ul>\n";
    }
    return $pagination;
}



function pagination($page_name, $per_page = 10, $page = 0, $url = '', $total) {

    $adjacents = "2";

    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;

    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total / $per_page);

    $lpm1 = $lastpage - 1;

    $pagination = "";

    if ($lastpage > 1) {
        $pagination .= "<ul class='pagination'>";

        if ($page > 1) {
            $pagination .= "<li><a href='" . $page_name . "?page=1'>First</a></li>";
            $pagination .= "<li><a href='" . $page_name . "?page=$prev'>Prev</a></li>";
        }
        if ($lastpage < 7 + ($adjacents * 2)) {
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>$counter</a></li>";
                else
                    $pagination.= "<li><a href='" . $page_name . "?page=$counter'>$counter</a></li>";
            }
        }
        elseif ($lastpage > 5 + ($adjacents * 2)) {
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='" . $page_name . "?page=$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='" . $page_name . "?page=$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a href='" . $page_name . "?page=$lastpage'>$lastpage</a></li>";
            }
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination.= "<li><a href='" . $page_name . "?page=1'>1</a></li>";
                $pagination.= "<li><a href='" . $page_name . "?page=2'>2</a></li>";


                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='" . $page_name . "?page=$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='" . $page_name . "?page=$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a href='" . $page_name . "?page=$lastpage'>$lastpage</a></li>";
            }
            else {
                $pagination.= "<li><a href='" . $page_name . "?page=1'>1</a></li>";
                $pagination.= "<li><a href='" . $page_name . "?page=2'>2</a></li>";

                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='" . $page_name . "?page=$counter'>$counter</a></li>";
                }
            }
        }

        if ($page < $counter - 1) {
            $pagination.= "<li><a href='" . $page_name . "?page=$next'>Next</a></li>";
            $pagination.= "<li><a href='" . $page_name . "?page=$lastpage'>Last</a></li>";
        }
        $pagination.= "</ul>\n";
    }
    return $pagination;
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if ($ip) {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        return $ip;
    }
    // There might not be any data
    return false;
}


function getSEOURL($str){
    if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') )
        $str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
    $str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
    $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $str);
    $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
    $str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
    $str = strtolower( trim($str, '-') );
    return $str;
}

function paging($limit,$numRows,$page){

    $allPages       = ceil($numRows / $limit);

    $start          = ($page - 1) * $limit;

    $querystring = "";

    foreach ($_GET as $key => $value) {
        if ($key != "page") $paginHTML .= "$key=$value&amp;";
    }

    $paginHTML = "";

    $paginHTML .= "Pages: ";

    for ($i = 1; $i <= $allPages; $i++) {
        if ($i>1) {
            $prev = $i-1;
            $paginHTML .= '<a href="?'.$querystring.'page='.$prev.'">Previous</a>';
        }
        $paginHTML .= "<a " . ($i == $page ? "class=\"selected\" " : "");
        $paginHTML .= "href=\"?{$querystring}page=$i";
        $paginHTML .= "\">$i</a> ";
        if ($i<$allPages) {
            $next = $i+1;
            $paginHTML .= '<a href="?'.$querystring.'page='.$next.'">Next</a>';
        }
    }

    return $paginHTML;

 }
 
 function FillCombo($data,$key,$value,$field_value=""){
     $combo = '';
     $combo .= '<option value="">---- Select ----</option>';
     if(count($data) > 0){
         foreach($data as $val){
            if ($field_value == $val->$key){
                $combo .= '<option selected  value="' . $val->$key . '">' . $val->$value . '</option>';
            }
            else{
                $combo .= '<option value="' . $val->$key . '">' . $val->$value . '</option>';
            }
         }
     }
     return $combo;
 }
 
 function FillCombo1($data,$key,$value,$field_value=""){
     $combo = '';
     //$combo .= '<option value="">---- Select ----</option>';
     if(count($data) > 0){
         foreach($data as $val){
            if ($field_value == $val->$key){
                $combo .= '<option selected  value="' . $val->$key . '">' . $val->$value . '</option>';
            }
            else{
                $combo .= '<option value="' . $val->$key . '">' . $val->$value . '</option>';
            }
         }
     }
     return $combo;
 }
 
 function FillMultiCombo($data,$key,$value,$field_value=""){
     $combo = '';
     $combo .= '<option value="">---- Select ----</option>';
     if(count($data) > 0){
         foreach($data as $val){
            $selected = '';
            if(is_array($field_value)){
                foreach($field_value as $mvalue){
                    if ($mvalue == $val->$key){
                        $selected = 'selected';
                    }
                }
            } 
            $combo .= '<option '.$selected.' value="' . $val->$key . '">' . $val->$value . '</option>';
         }
     }
     return $combo;
 }
 
 function FillTwoCombo($data,$key,$value,$value1,$field_value=""){
     $combo = '';
     $combo .= '<option value="">---- Select ----</option>';
     if(count($data) > 0){
         foreach($data as $val){
            $selected = '';
            if(is_array($field_value)){
                foreach($field_value as $mvalue){
                    if ($mvalue == $val->$key){
                        $selected = 'selected';
                    }
                }
            } 
            $combo .= '<option '.$selected.' value="' . $val->$key . '">' . $val->$value." ".$val->$value1. '</option>';
         }
     }
     return $combo;
 }
 
 function number_formats($amount){
     $amt = WEBSITE_CURRENCY.number_format($amount, 2,".", ",");
     return $amt;
 }
 
 function getNumberOfDays($start_date,$end_date){
	$interval = date_diff(date_create($start_date), date_create($end_date));
	return $interval->format('%a');
 
 }	


function send_android_notification($device_token,$param){
    define( 'API_ACCESS_KEY', 'AIzaSyCdgdyu6TFkKHq-OYAMp3Q3OPTR3xI9kpo' );
    $registrationIds = $device_token;//$device_token;
    // prep the bundle

    $fields = array
    (
        'registration_ids'  => $registrationIds,
        'data'              => $param,
    );
     
    $headers = array
    (
        'Authorization: key=' . API_ACCESS_KEY,
        'Content-Type: application/json'
    );
     
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
    curl_close( $ch );


    send_android_notification_new($device_token,$param);
    //echo $result;
 }


 function send_android_notification_new($device_token,$param){
    define( 'API_ACCESS_KEY', 'AIzaSyC2PwR9GR8IUdEKQXpmn1i57ZReS1ACXMk' );
    $registrationIds = $device_token;//$device_token;
    // prep the bundle

    $fields = array
    (
        'registration_ids'  => $registrationIds,
        'data'              => $param,
    );
     
    $headers = array
    (
        'Authorization: key=' . API_ACCESS_KEY,
        'Content-Type: application/json'
    );
     
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
    curl_close( $ch );
    //echo $result;
 }

?>