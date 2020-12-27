<?php

//echo 'It Works';

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

//------------------- avr ----------------
$avr_files = glob('ftp/1C/From1C/AVR*.json');

foreach ($avr_files as $avr_file) {
    $avr_string = file_get_contents($avr_file);
    $decoded_file = json_decode($avr_string,true);
    //echo print_r($decoded_file,true)."\n";

    foreach($decoded_file as $key => $value) {
    $kontragent_name = $value['Контрагент'];
    $kontragent_id = $value['Контрагент_UID_Kontragent'];
    $avr_name = $value['Ссылка'];
    $avr_id = $value['Номер'];
    $contract_number = $value['ДоговорКонтрагента'];
    $contract_date = $value['Дата'];
    $contract_summ = $value['СуммаДокумента'];
    $contract_uid = $value['Ссылка_UID_Sylka'];

//------------------------ проверка контрагента --------------------------
    $contact_data = executeREST('crm.contact.list', array('filter' => array("UF_CRM_1608052114" => $kontragent_id)));
    $contact_id = $contact_data['result'][0]['ID'];
    if (isset($contact_id)) {
echo 'Контакт существует в Б24'."\n";
//continue;
goto add_deal;
    }
echo 'Создаем контакт в Б24 с именем'.' '.$kontragent_name."\n";
    $add_contact = executeREST('crm.contact.add', array('fields' => array('NAME' => $kontragent_name,
                                                                          'UF_CRM_1608052114' => $kontragent_id,
                                                                          'SOURCE_DESCRIPTION' => 'from1c',
                                                                          "UF_CRM_1608484463" => 'YES' 
                                                                         )
                                                       )
                              );
    $contact_id = $add_contact['result'];
    //echo print_r($add_contact);
// ----------------------- Проверка наличия сделки или АВР ---------------------------------
add_deal:
    $deal_data = executeREST('crm.deal.list', array('filter' => array("UF_CRM_1608057920" => $contract_uid)));
    $is_deal_id = $deal_data['result'][0]['ID'];
    
    if (isset($is_deal_id)) {
        echo 'Сделка существует в Б24'."\n";
        continue;
        //goto add_contact;
            }
        echo 'Создаем сделку в Б24 с именем'.' '.$avr_name."\n";
            $add_deal = executeREST('crm.deal.add', array('fields' => array('TITLE' => $avr_name,
                                                                               'UF_CRM_1608057920' => $contract_uid, 
                                                                               'UF_CRM_1603882422632' => $contract_number,
                                                                               'UF_CRM_1603882476423' => $contract_date,
                                                                               'UF_CRM_1603882825' => $contract_summ,
                                                                               'UF_CRM_1608061277292' => $avr_id    
                                                                               )
                                                               )
                                      );
        $deal_id = $add_deal['result'];
        echo print_r($add_deal,true)."\n";
        goto add_contact;
//----------------------- Добавляем контакт к сделке ------------------------------------------
add_contact:
$deal_contact_add = executeREST('crm.deal.contact.add', array('id' => $deal_id,
                                                              'fields' => array('CONTACT_ID' => $contact_id)
                                                             )
                               );
    //$deal_id = $deal_data['result'][0]['ID'];

    echo print_r($deal_contact_add,true)."\n";
    //echo $deal_id."\n"; 
    
        }
   
   unlink($avr_file);
    }



?>
