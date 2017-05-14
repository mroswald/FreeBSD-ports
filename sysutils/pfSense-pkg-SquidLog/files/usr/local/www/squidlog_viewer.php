<?php
/*
 * squidlog_viewer.php
 */
require("guiconfig.inc");

if ($_POST['logfile']) {
    $logfile = $_POST['logfile'];
} else {
    $logfile = $default_logdir . "/" . $default_logfile;
}
if ($_POST['limit']) {
    $limit = intval($_POST['limit']);
} else {
    $limit = "50";
}

$filter = '';
if ($_POST['filter']) {
    $filter = $_POST['filter'];
}

$not = !!($_POST['not']);
$logfile = "/var/squid/logs/access.log";
$log_messages = array();
if (file_exists($logfile) && (filesize($logfile) > 0)) {
    $grep = "grep -ih";

    if (isset($filter) && $not) {
        $grepcmd = "$grep -v '$filter' $logfile";
    } else {
        $grepcmd = "$grep '$filter' $logfile";
    }

    $log_lines = trim(shell_exec("$grepcmd | wc -l"));
    $log_output = trim(shell_exec("$grepcmd | sort -M | tail -n $limit"));
    if (!empty($log_output)) {
        $log_messages = explode("\n", $log_output);
        $log_messages_count = sizeof($log_messages);
    }
}
$pgtitle = array(gettext("Status"), gettext("SquidLog"), gettext("Logs"));
include("head.inc");
?>

<?php include("fbegin.inc"); ?>

    <style>
        .border-bottom {
            border: 1px solid #F5F5F5; border-width: 0px 0 3px 0px;
        }
    </style>

    <form action="squidlog_viewer.php" method="post" name="iform">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #F5F5F5;">
        <tr><td>
            <?php
            $tab_array = array();
            $tab_array[] = array("Log Viewer", true, "/squidlog_viewer.php");
            display_top_tabs($tab_array);
            ?>
        </td></tr>
        <tr><td>
                <div id="mainarea">
                    <table id="maintable" class="tabcont" width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr><td>

                                <table width="100%" class="panel-default" style="background-color: #FFFFFF;">
                                    <h2 class="panel-title" style="background-color: #424242; color: #FFFFFF; border: solid 5px #424242;">Squid Logs</h2>
<!--                                    <tr><td class="border-bottom" width="22%">Log File</td><td class="border-bottom" width="78%"><select name="logfile">-->
<!--                                                --><?php
//                                                $log_files = syslogng_get_log_files($objects);
//                                                foreach($log_files as $log_file) {
//                                                    if($log_file == $logfile) {
//                                                        echo "<option value=\"$log_file\" selected=\"selected\">$log_file</option>\n";
//                                                    } else {
//                                                        echo "<option value=\"$log_file\">$log_file</option>\n";
//                                                    }
//                                                }
//                                                ?>
<!--                                            </select></td></tr>-->
                                    <tr><td class="border-bottom" width="22%">Limit</td><td class="border-bottom" width="78%"><select name="limit">
                                        <?php
                                            $limit_options = array("10", "20", "50", "100", "250", "500");
                                            foreach($limit_options as $limit_option) {
                                                if($limit_option == $limit) {
                                                    echo "<option value=\"$limit_option\" selected=\"selected\">$limit_option</option>\n";
                                                } else {
                                                    echo "<option value=\"$limit_option\">$limit_option</option>\n";
                                                }
                                            }
                                        ?>
                                    </select></td></tr>
                                    <tr><td class="border-bottom" width="22%">Filter</td><td class="border-bottom" width="78%"><input name="filter" value="<?=$filter?>" /></td></tr>
                                    <tr><td class="border-bottom" width="22%">Inverse Filter (NOT)</td><td class="border-bottom" width="78%"><input type="checkbox" name="not" <?php if($not) echo " CHECKED"; ?> /></td></tr>
                                    <tr><td class="border-bottom" colspan="2"><input type="submit" value="Refresh" /></td></tr>
                                    <tr><td class="border-bottom" colspan="2">
                                        <table class="tabcont" width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <?php
                                            if(!empty($log_messages)) {
                                                echo "<tr><td colspan=3 class=\"listtopic\">Showing $log_messages_count of $log_lines messages</td></tr>\n";
                                                foreach($log_messages as $log_message) {
                                                    $log_parts = preg_split("/[\s]+/", $log_message);
                                                    echo "<tr>";
                                                    echo "<td width=\"15%\" class=\"listr\">" . date("Y-m-d H:i:s", $log_parts[0]) . "</td>";
                                                    echo "<td width=\"15%\" class=\"listr\">$log_parts[2]</td>";
                                                    echo "<td class=\"listr\">$log_parts[6]</td>";
                                                    echo "</tr>\n";
                                                }
                                            } else {
                                                echo "<tr><td><span class=\"red\">No log messages found or log file is empty.</span></td></tr>\n";
                                            }
                                            ?>
                                        </table>
                                    </td></tr>
                                </table>

                            </td></tr>
                    </table>
                </div>
            </td></tr>
    </table>
    </form>
<?php include("foot.inc"); ?>