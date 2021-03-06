<?php
/**
 * DZCP - deV!L`z ClanPortal - Mainpage ( dzcp.de )
 * deV!L`z Clanportal ist ein Produkt von CodeKing,
 * geändert durch my-STARMEDIA und Codedesigns.
 *
 * Diese Datei ist ein Bestandteil von dzcp.de
 * Diese Version wurde speziell von Lucas Brucksch (Codedesigns) für dzcp.de entworfen bzw. verändert.
 * Eine Weitergabe dieser Datei außerhalb von dzcp.de ist nicht gestattet.
 * Sie darf nur für die Private Nutzung (nicht kommerzielle Nutzung) verwendet werden.
 *
 * Homepage: http://www.dzcp.de
 * E-Mail: info@web-customs.com
 * E-Mail: lbrucksch@codedesigns.de
 * Copyright 2017 © CodeKing, my-STARMEDIA, Codedesigns
 */

/**
 * Usage {lang msgID="language_german"}
 * @param $params
 * @param $smarty
 * @return mixed|string
 */
function smarty_function_lang($params,Smarty_Internal_Template &$smarty) {
    global $language_text;

    /** @var TYPE_NAME $params */
    $params['msgID']='_'.$params['msgID'];
    if(!array_key_exists($params['msgID'],$language_text) && !defined($params['msgID'])) {
        return 'MsgID: "'.$params['msgID'].'"" does not exist!';
    }

    return defined($params['msgID']) ? constant($params['msgID']) : $language_text[$params['msgID']];
}