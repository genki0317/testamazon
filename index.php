<?php

require "./config.php";
require "./base.php";
require "./common.php";

set_time_limit(7200);

//データベース接続
//ConnDB();
//メイン処理
Main();

//=========================================================================================================
//名前 Main関数
//機能 プログラムのメイン関数
//引数 なし
//戻値 なし
//=========================================================================================================
function Main()
{

	eval(globals());

	$filename="top.html";
	$fp=$DOCUMENT_ROOT.$filename;
	$str=@file_get_contents($fp);

    /*
    $filename="common/template/listo1.html";
	$fp=$DOCUMENT_ROOT.$filename;
	$strM=@file_get_contents($fp);
	$strMain="";
	$StrSQL="SELECT DAT_O1.* FROM DAT_O1 inner join DAT_M1 on DAT_M1.MID=DAT_O1.MID and DAT_M1.ENABLE='ENABLE:公開中' and DAT_O1.ENABLE='ENABLE:公開中' order by rand() limit 0,5";
	$rs=mysqli_query(ConnDB(),$StrSQL);
	while ($item = mysqli_fetch_assoc($rs)) {
		$tmp=$strM;

		$tmp=DispO1($item, $tmp);
		$tmp=DispPoint1($item['OID'], $tmp);

		$StrSQL="SELECT * FROM DAT_M1 where MID='".$item['MID']."'";
		$rs2=mysqli_query(ConnDB(),$StrSQL);
		$item2=mysqli_fetch_assoc($rs2);
		$tmp=DispM1($item2, $tmp);

		// 未ログインの場合にm_searchをsearchに変換
		if(!isset($_SESSION['MID'])) {
			$tmp = str_replace('/m_search2/', '/search2/', $tmp);
		}

		$strMain=$strMain.$tmp.chr(13);
	}

	$str=str_replace("[LIST_1]", $strMain, $str);
    */


    $str=str_replace("[CSSDATE]",date('YmdHis'),$str);

    print $str;

	return $function_ret;
} 

//=========================================================================================================
//名前 DB初期化
//機能 DBとの接続を確立する
//引数 なし
//戻値 $function_ret
//=========================================================================================================
function ConnDB()
{
	eval(globals());

	$ConnDB=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWD, DB_DBNAME);

	return $ConnDB;
} 


?>