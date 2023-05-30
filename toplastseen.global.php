<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=global
Tags=index.tpl:{PHP|top_last_seen('toplastseen.tpl')}
[END_COT_EXT]
==================== */
/**
 * @package toplastseen
 * @version 1.0.1
 * @author Aliaksei Kobak
 * @copyright Copyright (c) Aliaksei Kobak 2023
 * @license BSD
 */

//defined('COT_CODE') or die('Wrong URL');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('plug', 'toplastseen');
cot_block($usr['auth_read']);

require_once cot_langfile('toplastseen', 'plug');
require_once cot_incfile('toplastseen', 'plug');

function top_last_seen ( $tpl = 'toplastseen.global.tpl' ){

    global $L,$db,$db_users,$cfg;
    
    $date = cot::$sys['now'];
    
    $sql = $db->query("SELECT * FROM $db_users WHERE user_lastlog <= $date ORDER BY user_lastlog DESC LIMIT {$cfg['users']['maxusersperpage']}");
    
	$t = new XTemplate(cot_tplfile($tpl, 'plug', true));
    
	$count = 0;
	while ( ($row = $sql->fetch()) != 0 )
	{
		$count++; 
		
		$t->assign(array(
			'UMP_ROW_ODDEVEN' => cot_build_oddeven($count),
			'UMP_ROW_NUM' => $count,
			'UMP_ROW' => $row,
		));    
			
		$t->assign(array(
		'UMP_ROW_USERNAME' => cot_rc_link(cot_url('users', 'm=edit&id='.$row['user_id']), $row['user_name']),//$row['user_name'],
		'UMP_ROW_LASTLOGIN' => cot_date('datetime_medium',$row['user_lastlog']), 
		'UMP_ROW_LASTLOGIN_STAMP' => $row['user_lastlog'],
		'UMP_ROW_TIMEAGO' => cot_build_timegap($row['user_lastlog']),
		'UMP_ROW_LOG_AMOUNT' => $row['user_logcount']	    
		));	    
		$t->parse('MAIN.UMP_ROW');
	}
 	
	$t->parse();
 
return $t->text();
}
