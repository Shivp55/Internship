<?php

// Return Record type
define("MYSQL_FETCH_ALL", 'Fetch_All');
define("MYSQL_FETCH_SINGLE", 'Fetch_Single');
define("MYSQL_FETCH_OBJECT", 'Fetch_Object');
define("MYSQL_FETCH_ARRAY", 'Fetch_Array');

class DB_MYSQL {
    /* public: configuration parameters */

    var $Auto_Free = 0;     ## Set to 1 for automatic mysql_free_result()
    var $Debug = 1;     ## Set to 1 for debugging messages.
    var $Halt_On_Error = "yes"; ## "yes" (halt with message), "no" (ignore errors quietly), "report" (ignore errror, but spit a warning)
    var $Seq_Table = "dsc-ecommerce";
    var $Debug_info = array();  ## Store all queries

    /* public: result array and current row number */
    var $Record = array();
    var $Row;

    /* public: current error number and error text */
    var $Errno = 0;
    var $Error = "";

    /* public: this is an api revision, not a CVS revision. */
    var $type = "mysqli";
    var $revision = "5.6.11";

    /* private: link and query handles */
    var $Link_ID = 0;
    var $Query_ID = 0;

    /* public: constructor */

    function CONNECTION($Host, $Database, $User, $Password, $Persistency = false) {

        $this->Host = $Host;
        $this->Database = $Database;
        $this->User = $User;
        $this->Password = $Password;
        $this->Persistency = $Persistency;
        /* establish connection, select database */
        if (0 == $this->Link_ID) {
            if ($this->Persistency) {
                $this->Link_ID = @mysqli_connect($this->Host, $this->User, $this->Password, $this->Database);

                if (!$this->Link_ID) {
                    $this->halt("pconnect($Host, $User, \$Password) failed.");
                    return 0;
                }
            } else {
                $this->Link_ID = @mysqli_connect($this->Host, $this->User, $this->Password, $this->Database);


                if (!$this->Link_ID) {
                    //die("Connection error: " . mysqli_connect_error());

                    $this->halt("connect($Host, $User, \$Password) failed.");
                    return 0;
                }
            }
        }
        return $this->Link_ID;
    }

    /* public: reselect the database */

    function reset_database() {
        if (!@mysqli_select_db($this->Link_ID, $this->Database)) {
            $this->halt("cannot use database " . $this->Database);
            return 0;
        }
    }

    /* public: reconnect the database server */

    function reconnect() {
        if ($this->Persistency) {
            $this->Link_ID = @mysqli_connect($this->Host, $this->User, $this->Password, $this->Database);

            if (!$this->Link_ID) {
                $this->halt("pconnect($Host, $User, \$Password) failed.");
                return 0;
            }
        } else {
            $this->Link_ID = @mysqli_connect($this->Host, $this->User, $this->Password, $this->Database);

            if (!$this->Link_ID) {
                $this->halt("connect($Host, $User, \$Password) failed.");
                return 0;
            }
        }
        return $this->Link_ID;
    }

    /* public: some trivial reporting */

    function link_id() {
        return $this->Link_ID;
    }

    /* public: some trivial reporting */

    function query_debug() {
        return $this->Debug_info;
    }

    function database_name() {
        return $this->Database;
    }

    function query_id() {
        return $this->Query_ID;
    }

    /* public: discard the query result */

    function free() {
        @mysqli_free_result($this->Query_ID);
        $this->Query_ID = 0;
    }

    /* public: perform a query */

    function query($Query_String) {
        if ($Query_String == "")
            return 0;

        if ($this->Query_ID) {
            $this->free();
        }

        if ($this->Debug)
            $this->Debug_info[] = array('Query' => $Query_String);

        $this->Query_ID = @mysqli_query($this->Link_ID, $Query_String);
        $this->Row = 0;
        $this->Errno = mysqli_errno($this->Link_ID);
        $this->Error = mysqli_error($this->Link_ID);

        if (!$this->Query_ID) {
            $this->halt("Invalid SQL: " . $Query_String);
        }
        return $this->Query_ID;
    }

    /* public: fetch result set */

    function fetch_object($fetch = MYSQL_FETCH_ALL) {
        # Store records
        $records = array();

        # Fetch records
        if ($fetch == MYSQL_FETCH_ALL) {
            while ($data = mysqli_fetch_object($this->Query_ID))
                array_push($records, $data);

            return $records;
        } else if ($fetch == MYSQL_FETCH_SINGLE) {
            return mysqli_fetch_object($this->Query_ID);
        }
        return false;
    }

    /* public: evaluate the result (size, width) */

    function affected_rows() {
        return @mysqli_affected_rows($this->Link_ID);
    }

    function num_rows() {
        return @mysqli_num_rows($this->Query_ID);
    }

    function num_fields() {
        return @mysqli_num_fields($this->Query_ID);
    }

    function f($Name) {

        if (isset($this->Record[$Name])) {
            return $this->Record[$Name];
        }
    }

    /* public: find available table names */

    function table_names() {
        $this->reconnect();
        $h = @mysqli_query("show tables", $this->Link_ID);
        $i = 0;
        while ($info = @mysqli_fetch_row($h)) {
            $return[$i]["table_name"] = $info[0];
            $return[$i]["tablespace_name"] = $this->Database;
            $return[$i]["database"] = $this->Database;
            $i++;
        }
        @mysqli_free_result($h);
        return $return;
    }

    /* public: Drop Table */

    function drop_table($table_name) {
        return $this->query("drop table " . $table_name);
    }

    /* public: Drop Database */

    function drop_database() {
        return $this->query("drop database " . $this->Database);
    }

    /* publid: Close connection */

    function db_close() {
        if ($this->Link_ID) {
            if ($this->Query_ID) {
                @mysqli_free_result($this->Query_ID);
            }
            $result = @mysqli_close($this->Link_ID);
            return $result;
        } else {
            return false;
        }
    }

    /* private: error handling */

    function Halt_On_Error($flg) {
        $this->Halt_On_Error = $flg;
    }

    function halt($msg) {
        $this->Error = @mysqli_error($this->Link_ID);
        $this->Errno = @mysqli_errno($this->Link_ID);
        if ($this->Halt_On_Error == "no")
            return;

        $this->haltmsg($msg);

        if ($this->Halt_On_Error != "report")
            die("Session halted.");
    }

    function haltmsg($msg) {
        printf("</td></tr></table><b>Database error:</b> %s<br>\n", $msg);
        printf("<b>MySQL Error</b>: %s (%s)<br>\n", $this->Errno, $this->Error);
    }

    function sql_error($link_id = 0) {
        $result["message"] = @mysqli_error($this->Link_ID);
        $result["code"] = @mysqli_errno($this->Link_ID);
        return $result;
    }

    function sql_inserted_id() {
        if ($this->Link_ID) {
            $result = @mysqli_insert_id($this->Link_ID);
            return $result;
        } else {
            return false;
        }
    }

    function next_record() {
        if (!$this->Link_ID) {
            $this->halt("next_record called with no query pending.");
            return 0;
        }
        $this->Record = @mysqli_fetch_array($this->Query_ID);
        $this->Row += 1;
        $this->Errno = mysqli_errno($this->Link_ID);
        $this->Error = mysqli_error($this->Link_ID);

        $stat = is_array($this->Record);

        if (!$stat && $this->Auto_Free) {
            $this->free();
        }
        return $stat;
    }

}

?>