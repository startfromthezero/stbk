<?php
require_once("Connect2.1/API/qqConnectAPI.php");
$qc = new QC();
$access_token = $qc->qq_callback();
$openid=$qc->get_openid();
$qc = new QC($access_token, $openid);
$ret = $qc->get_user_info();
echo "<script>window.location.href='http://www.stbk.xyz';</script>";