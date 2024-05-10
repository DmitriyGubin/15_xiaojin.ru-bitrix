<? 
 
// CRM server conection data
define('CRM_HOST', 'hmru.bitrix24.ru'); // your CRM domain name
define('CRM_PORT', '443'); // CRM server port
define('CRM_PATH', '/crm/configs/import/lead.php'); // CRM server REST service path

// CRM server authorization data
define('CRM_LOGIN', '5402@hualian.ru'); // login of a CRM user able to manage leads
define('CRM_PASSWORD', 'hualian123'); // password of a CRM user
 
/********************************************************************************************/

// POST processing


    if(empty($utm_source)){ $utm_source = '';}
    if(empty($utm_champaign)){ $utm_champaign = '';}
    if(empty($utm_content)){ $utm_content = '';}
    if(empty($utm_medium)){ $utm_medium = '';}
    if(empty($utm_term)){ $utm_term = '';}

	$postData = array(
		'TITLE' => 'Заявка с сайта xiaojin.ru', // название лида
		'NAME' => $_POST["fio"], // имя
		'PHONE_WORK' => $_POSTT["phone"],
		'EMAIL_WORK' => $_POST["email"],
		'UF_CRM_1668792732' => $_POST['product_name'],
        'ASSIGNED_BY_ID'=>'6',
        'SOURCE_ID'=>'ADVERTISING',
        'UTM_SOURCE'=>$utm_source,
        'UTM_CAMPAIGN'=>$utm_champaign,
        'UTM_CONTENT'=>$utm_content,
        'UTM_MEDIUM'=>$utm_medium,
        'UTM_TERM'=>$utm_term,
		//пример передачи пользовательского поля UF_CRM_xxxxxxxxx - тут надо передавать id поля в битриск
 	);

	

	// append authorization data
	if (defined('CRM_AUTH'))
	{
		$postData['AUTH'] = CRM_AUTH;
	}
	else
	{
		$postData['LOGIN'] = CRM_LOGIN;
		$postData['PASSWORD'] = CRM_PASSWORD;
	}

	// open socket to CRM
	$fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
	if ($fp)
	{
		// prepare POST data
		$strPostData = '';
		foreach ($postData as $key => $value)
			$strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);

		// prepare POST headers
		$str = "POST ".CRM_PATH." HTTP/1.0\r\n";
		$str .= "Host: ".CRM_HOST."\r\n";
		$str .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$str .= "Content-Length: ".strlen($strPostData)."\r\n";
		$str .= "Connection: close\r\n\r\n";

		$str .= $strPostData;

		// send POST to CRM
		fwrite($fp, $str);

		// get CRM headers
		$result = '';
		while (!feof($fp))
		{
			$result .= fgets($fp, 128);
		}
		fclose($fp);

		// cut response headers
		$response = explode("\r\n\r\n", $result);

		$output = '<pre>'.print_r($response[1], 1).'</pre>';
        
        // echo $output;
	}
	// else
	// {
	// 	echo 'Connection Failed! '.$errstr.' ('.$errno.')';
	// }


?>