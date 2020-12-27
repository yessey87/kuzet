<?php

//echo 'bx24_company_sync';
date_default_timezone_set("Asia/Almaty");
function executeREST($method, $params) {

    $queryUrl = 'https://nskuzet.bitrix24.kz/rest/1/jlrvpl6c2i9tyewk/'.$method.'.json';
    $queryData = http_build_query($params);
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
        CURLOPT_POSTFIELDS => $queryData,
    ));
    
    $result = curl_exec($curl);
    curl_close($curl);
    
    return json_decode($result, true);
    }


//---------------- Получить список компании ----------------------

$company_data = executeREST('crm.company.list', array(
                                                        'filter' => array('UF_CRM_1608895130' => 'NO'),
                                                        'select' => array('ID', 'TITLE', 'PHONE', 'UF_*')
                                                     )
                           );
//print_r($company_data);
$company0_id      = $company_data['result'][0]['ID'];
$company0_name    = $company_data['result'][0]['TITLE'];
$company0_phone   = $company_data['result'][0]['PHONE'][0]['VALUE'];
$company0_bin     = $company_data['result'][0]['UF_CRM_1608894617'];
$company0_account = $company_data['result'][0]['UF_CRM_1608894619'];
$company0_bank    = $company_data['result'][0]['UF_CRM_1608894681'];

$company1_id      = $company_data['result'][1]['ID'];
$company1_name    = $company_data['result'][1]['TITLE'];
$company1_phone   = $company_data['result'][1]['PHONE'][0]['VALUE'];
$company1_bin     = $company_data['result'][1]['UF_CRM_1608894617'];
$company1_account = $company_data['result'][1]['UF_CRM_1608894619'];
$company1_bank    = $company_data['result'][1]['UF_CRM_1608894681'];

$company2_id      = $company_data['result'][2]['ID'];
$company2_name    = $company_data['result'][2]['TITLE'];
$company2_phone   = $company_data['result'][2]['PHONE'][0]['VALUE'];
$company2_bin     = $company_data['result'][2]['UF_CRM_1608894617'];
$company2_account = $company_data['result'][2]['UF_CRM_1608894619'];
$company2_bank    = $company_data['result'][2]['UF_CRM_1608894681'];

$company3_id      = $company_data['result'][3]['ID'];
$company3_name    = $company_data['result'][3]['TITLE'];
$company3_phone   = $company_data['result'][3]['PHONE'][0]['VALUE'];
$company3_bin     = $company_data['result'][3]['UF_CRM_1608894617'];
$company3_account = $company_data['result'][3]['UF_CRM_1608894619'];
$company3_bank    = $company_data['result'][3]['UF_CRM_1608894681'];

$company4_id      = $company_data['result'][4]['ID'];
$company4_name    = $company_data['result'][4]['TITLE'];
$company4_phone   = $company_data['result'][4]['PHONE'][0]['VALUE'];
$company4_bin     = $company_data['result'][4]['UF_CRM_1608894617'];
$company4_account = $company_data['result'][4]['UF_CRM_1608894619'];
$company4_bank    = $company_data['result'][4]['UF_CRM_1608894681'];

$company5_id      = $company_data['result'][5]['ID'];
$company5_name    = $company_data['result'][5]['TITLE'];
$company5_phone   = $company_data['result'][5]['PHONE'][0]['VALUE'];
$company5_bin     = $company_data['result'][5]['UF_CRM_1608894617'];
$company5_account = $company_data['result'][5]['UF_CRM_1608894619'];
$company5_bank    = $company_data['result'][5]['UF_CRM_1608894681'];

$company6_id      = $company_data['result'][6]['ID'];
$company6_name    = $company_data['result'][6]['TITLE'];
$company6_phone   = $company_data['result'][6]['PHONE'][0]['VALUE'];
$company6_bin     = $company_data['result'][6]['UF_CRM_1608894617'];
$company6_account = $company_data['result'][6]['UF_CRM_1608894619'];
$company6_bank    = $company_data['result'][6]['UF_CRM_1608894681'];

$company7_id      = $company_data['result'][7]['ID'];
$company7_name    = $company_data['result'][7]['TITLE'];
$company7_phone   = $company_data['result'][7]['PHONE'][0]['VALUE'];
$company7_bin     = $company_data['result'][7]['UF_CRM_1608894617'];
$company7_account = $company_data['result'][7]['UF_CRM_1608894619'];
$company7_bank    = $company_data['result'][7]['UF_CRM_1608894681'];

$company8_id      = $company_data['result'][8]['ID'];
$company8_name    = $company_data['result'][8]['TITLE'];
$company8_phone   = $company_data['result'][8]['PHONE'][0]['VALUE'];
$company8_bin     = $company_data['result'][8]['UF_CRM_1608894617'];
$company8_account = $company_data['result'][8]['UF_CRM_1608894619'];
$company8_bank    = $company_data['result'][8]['UF_CRM_1608894681'];

$company9_id      = $company_data['result'][9]['ID'];
$company9_name    = $company_data['result'][9]['TITLE'];
$company9_phone   = $company_data['result'][9]['PHONE'][0]['VALUE'];
$company9_bin     = $company_data['result'][9]['UF_CRM_1608894617'];
$company9_account = $company_data['result'][9]['UF_CRM_1608894619'];
$company9_bank    = $company_data['result'][9]['UF_CRM_1608894681'];

//echo $company0_name.' '.$company1_account.' '.$company2_bank;
if (isset($company0_id)) {

$headers = array(
    'Company0_ID',
    'Company0_Name',
    'Company0_Phone',
    'Company0_BIN',
    'Company0_Account',
    'Company0_Bank',

    'Company1_ID',
    'Company1_Name',
    'Company1_Phone',
    'Company1_BIN',
    'Company1_Account',
    'Company1_Bank',

    'Company2_ID',
    'Company2_Name',
    'Company2_Phone',
    'Company2_BIN',
    'Company2_Account',
    'Company2_Bank',

    'Company3_ID',
    'Company3_Name',
    'Company3_Phone',
    'Company3_BIN',
    'Company3_Account',
    'Company3_Bank',

    'Company4_ID',
    'Company4_Name',
    'Company4_Phone',
    'Company4_BIN',
    'Company4_Account',
    'Company4_Bank',

    'Company5_ID',
    'Company5_Name',
    'Company5_Phone',
    'Company5_BIN',
    'Company5_Account',
    'Company5_Bank',

    'Company6_ID',
    'Company6_Name',
    'Company6_Phone',
    'Company6_BIN',
    'Company6_Account',
    'Company6_Bank',

    'Company7_ID',
    'Company7_Name',
    'Company7_Phone',
    'Company7_BIN',
    'Company7_Account',
    'Company7_Bank',

    'Company8_ID',
    'Company8_Name',
    'Company8_Phone',
    'Company8_BIN',
    'Company8_Account',
    'Company8_Bank',

    'Company9_ID',
    'Company9_Name',
    'Company9_Phone',
    'Company9_BIN',
    'Company9_Account',
    'Company9_Bank'

    
);

$data = array(array(
    'Company0_ID'      => $company0_id,
    'Company0_Name'    => $company0_name,
    'Company0_Phone'   => $company0_phone,
    'Company0_BIN'     => $company0_bin,
    'Company0_Account' => $company0_account,
    'Company0_Bank'    => $company0_bank,

    'Company1_ID'      => $company1_id,
    'Company1_Name'    => $company1_name,
    'Company1_Phone'   => $company1_phone,
    'Company1_BIN'     => $company1_bin,
    'Company1_Account' => $company1_account,
    'Company1_Bank'    => $company1_bank,

    'Company2_ID'      => $company2_id,
    'Company2_Name'    => $company2_name,
    'Company2_Phone'   => $company2_phone,
    'Company2_BIN'     => $company2_bin,
    'Company2_Account' => $company2_account,
    'Company2_Bank'    => $company2_bank,
    
    'Company3_ID'      => $company3_id,
    'Company3_Name'    => $company3_name,
    'Company3_Phone'   => $company3_phone,
    'Company3_BIN'     => $company3_bin,
    'Company3_Account' => $company3_account,
    'Company3_Bank'    => $company3_bank,

    'Company4_ID'      => $company4_id,
    'Company4_Name'    => $company4_name,
    'Company4_Phone'   => $company4_phone,
    'Company4_BIN'     => $company4_bin,
    'Company4_Account' => $company4_account,
    'Company4_Bank'    => $company4_bank,

    'Company5_ID'      => $company5_id,
    'Company5_Name'    => $company5_name,
    'Company5_Phone'   => $company5_phone,
    'Company5_BIN'     => $company5_bin,
    'Company5_Account' => $company5_account,
    'Company5_Bank'    => $company5_bank,

    'Company6_ID'      => $company6_id,
    'Company6_Name'    => $company6_name,
    'Company6_Phone'   => $company6_phone,
    'Company6_BIN'     => $company6_bin,
    'Company6_Account' => $company6_account,
    'Company6_Bank'    => $company6_bank,

    'Company7_ID'      => $company7_id,
    'Company7_Name'    => $company7_name,
    'Company7_Phone'   => $company7_phone,
    'Company7_BIN'     => $company7_bin,
    'Company7_Account' => $company7_account,
    'Company7_Bank'    => $company7_bank,

    'Company8_ID'      => $company8_id,
    'Company8_Name'    => $company8_name,
    'Company8_Phone'   => $company8_phone,
    'Company8_BIN'     => $company8_bin,
    'Company8_Account' => $company8_account,
    'Company8_Bank'    => $company8_bank,

    'Company9_ID'      => $company9_id,
    'Company9_Name'    => $company9_name,
    'Company9_Phone'   => $company9_phone,
    'Company9_BIN'     => $company9_bin,
    'Company9_Account' => $company9_account,
    'Company9_Bank'    => $company9_bank,
)
);




$fp = fopen('ftp/1C/To1C/companys_'.date("d-m-Y-H-i-s").'.csv', 'w');
fputs($fp, chr(0xEF) . chr(0xBB) . chr(0xBF));
fputcsv($fp, $headers, "%");

foreach($data as $fields) {
    fputcsv($fp, $fields, "%");
}

fclose($fp);

// ----------- update Company ---------------

foreach ($company_data as $key => $value)   {

    foreach ($value as $key1 => $value1){

$company_id = $value1['ID'];

//echo $company_id."\n";

$company_update = executeREST('crm.company.update', array(
                                                            'id' => $company_id,
                                                            'fields' => array('UF_CRM_1608895130' => 'YES')
                                                        )
                             );


                                        }
                                            }
}

//file_put_contents('logs/make_csv_kaspi_almaty.log', date("d/m/y - H:i -", time()).' '.'dealID_'.$dealID."\n", FILE_APPEND);

echo 'Silence is Golden!';

//file_put_contents('log.txt', $contact_name, FILE_APPEND);


?>