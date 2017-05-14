<?php
/*
 * squidlog.priv.inc
 */

global $priv_list;

$priv_list['page-status-squidlog'] = array();
$priv_list['page-status-squidlog']['name'] = "WebCfg - Status: Squidlog";
$priv_list['page-status-squidlog']['descr'] = "Allow access to SquidLog package GUI";
$priv_list['page-status-squidlog']['match'] = array();
$priv_list['page-status-squidlog']['match'][] = "pkg.php?xml=squidlog.xml*";
$priv_list['page-status-squidlog']['match'][] = "pkg_edit.php?xml=squidlog.xml*";

?>
