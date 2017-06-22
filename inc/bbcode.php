<?php
/**
 * DZCP - deV!L`z ClanPortal - Mainpage ( dzcp.de )
 * deV!L`z Clanportal ist ein Produkt von CodeKing,
 * ge�ndert d�rch my-STARMEDIA und Codedesigns.
 *
 * Diese Datei ist ein Bestandteil von dzcp.de
 * Diese Version wurde speziell von Lucas Brucksch (Codedesigns) f�r dzcp.de entworfen bzw. ver�ndert.
 * Eine Weitergabe dieser Datei au�erhalb von dzcp.de ist nicht gestattet.
 * Sie darf nur f�r die Private Nutzung (nicht kommerzielle Nutzung) verwendet werden.
 *
 * Homepage: http://www.dzcp.de
 * E-Mail: info@web-customs.com
 * E-Mail: lbrucksch@codedesigns.de
 * Copyright 2017 � CodeKing, my-STARMEDIA, Codedesigns
 */

/**
 * BBCodeParser Class expanded the NBBC: The New BBCode Parser
 */
class bbcode_base
{
    protected static $BBCode = null;
    private static $words = null;
    private static $string = null;

    /**
     * bbcode_base constructor.
     */
    public function __construct() {
        self::$BBCode = new BBCode(); //Call NBBC constructor

        //Add Smileys
        self::$BBCode->SetSmileyDir(basePath.'/vendor/nbbc/smileys'); //default
        self::$BBCode->SetSmileyURL('../vendor/nbbc/smileys');
        if(is_dir(basePath.'/inc/_templates_/'.common::$tmpdir.'/images/smileys')) { //Check Template
            $smileyadd = common::get_files(basePath.'/inc/_templates_/'.common::$tmpdir.'/images/smileys',false,true, ['gif','png','jpg']);
            if($smileyadd && count($smileyadd) >= 1) {
                self::$BBCode->SetSmileyDir(basePath . '/inc/_templates_/' . common::$tmpdir . '/images/smileys');
                self::$BBCode->SetSmileyURL(common::$designpath . '/images/smileys');
                self::$BBCode->ClearSmileys();
                foreach (self::$BBCode->GetDefaultSmileys() as $tag => $smiley) {
                    if (file_exists(basePath . '/inc/_templates_/' . common::$tmpdir . '/images/smileys/' . $smiley)) {
                        self::$BBCode->AddSmiley($tag, $smiley);
                    }
                } unset($tag, $smiley);

                //Add new Smileys from Template
                if ($smileys = common::get_files(basePath . '/inc/_templates_/' . common::$tmpdir . '/images/smileys/',false,true, ['gif', 'png', 'jpg'])) {
                    foreach ($smileys as $smiley) {
                        $smiley_file = strtolower($smiley);
                        $smiley_name = str_replace(['.gif', '.png', '.jpg'], '', $smiley_file);
                        if (file_exists(basePath . '/inc/_templates_/' . common::$tmpdir . '/images/smileys/'.$smiley_name.'.xml')) { //Load XML
                            $xml = simplexml_load_file(basePath . '/inc/_templates_/' . common::$tmpdir . '/images/smileys/' . $smiley_name . '.xml');
                            foreach ($xml->tag as $tag) {
                                self::$BBCode->AddSmiley(':'.str_replace(' ','_',(string)$tag[0]).':', $smiley_file);
                            } unset($xml,$tag);
                        } else {
                            self::$BBCode->AddSmiley(':'.str_replace(' ','_',$smiley_name).':', $smiley_file);
                        }
                    }
                    unset($smileys, $smiley);
                }
            }
        }

        //Add new BBCodes
        self::$BBCode->AddRule('border', [
            'mode' => BBCODE_MODE_ENHANCED,
            'template' => '<div style="border: {$size}px solid {$color}">{$_content}</div>',
            'allow' => [
                'color' => '/^#[0-9a-fA-F]+|[a-zA-Z]+$/',
                'size' => '/^[1-9][0-9]*$/',
            ],
            'default' => [
                'color' => 'blue',
                'size' => '1',
            ],
            'class' => 'block',
            'allow_in' => ['listitem', 'block', 'columns'],
        ]);

        /*
         * ##############################
         * Youtube TAG
         * ##############################
         *
         * Usage:
         * [youtube]xxxxx[/youtube] or
         * [youtube height=200 width=300]xxxxx[/youtube] or
         * [youtube height=200 width=300 autoplay=1]xxxxx[/youtube]
         */
        self::$BBCode->AddRule('youtube', Array(
            'mode' => BBCODE_MODE_CALLBACK,
            'method' => 'bbcode_base::callback_youtube',
            'class' => 'block',
            'allow_in' => Array('listitem', 'block', 'columns'),
        ));

        /*
         * ##############################
         * DivX Player TAG
         * ##############################
         *
         * Usage:
         * [divx]http://xxx.xx/video123.divx[/divx] or
         * [divx height=200 width=300]http://xxx.xx/video123.divx[/divx] or
         * [divx height=200 width=300 autoplay=1]http://xxx.xx/video123.divx[/divx]
         */
        self::$BBCode->AddRule('divx', Array(
            'mode' => BBCODE_MODE_CALLBACK,
            'method' => 'bbcode_base::callback_divx',
            'class' => 'block',
            'allow_in' => Array('listitem', 'block', 'columns'),
        ));

        /*
         * ##############################
         * HTML 5 Video Player TAG
         * ##############################
         *
         * Usage:
         * [video]http://xxx.xx/video123.mp4[/video] or
         * [video height=200 width=300]http://xxx.xx/video123.mp4[/video] or
         * [video height=200 width=300 autoplay=1]http://xxx.xx/video123.mp4[/video]
         */
        self::$BBCode->AddRule('video', Array(
            'mode' => BBCODE_MODE_CALLBACK,
            'method' => 'bbcode_base::callback_video',
            'class' => 'block',
            'allow_in' => Array('listitem', 'block', 'columns'),
        ));

        /*
         * ##############################
         * Vimeo Player TAG
         * ##############################
         *
         * Usage:
         * [vimeo]xxxxxxxx[/vimeo] or
         * [vimeo height=200 width=300]xxxxxxxx[/vimeo] or
         * [vimeo height=200 width=300 autoplay=1]xxxxxxxx[/vimeo]
         */
        self::$BBCode->AddRule('vimeo', Array(
            'mode' => BBCODE_MODE_CALLBACK,
            'method' => 'bbcode_base::callback_vimeo',
            'class' => 'block',
            'allow_in' => Array('listitem', 'block', 'columns'),
        ));

        /*
         * ##############################
         * Golem Player TAG
         * ##############################
         *
         * Usage:
         * [golem]xxxxxxxx[/golem] or
         * [golem height=200 width=300]xxxxxxxx[/golem] or
         * [golem height=200 width=300 autoplay=1]xxxxxxxx[/golem]
         */
        self::$BBCode->AddRule('golem', Array(
            'mode' => BBCODE_MODE_CALLBACK,
            'method' => 'bbcode_base::callback_golem',
            'class' => 'block',
            'allow_in' => Array('listitem', 'block', 'columns'),
        ));

        /*
         * ##############################
         * Text Hiden TAG
         * ##############################
         *
         * Usage:
         * [hide]Text1234 show on >= level 1[/hide] or
         * [hide level=2]Text1234 show on >= level 2[/hide] or
         * [hide level=3]Text1234 show on >= level 3[/hide] or
         * [hide level=4]Text1234 show on == level 4[/hide]
         */
        self::$BBCode->AddRule('hide', Array(
            'mode' => BBCODE_MODE_CALLBACK,
            'method' => 'bbcode_base::callback_hide',
            'class' => 'block',
            'allow_in' => Array('listitem', 'block', 'columns'),
        ));
    }

    /**
     * Youtube BBCode callback for NBBC
     * @param $bbcode
     * @param $action
     * @param $name
     * @param $default
     * @param $params
     * @param $content
     * @return bool|string
     */
    public static function callback_youtube($bbcode, $action, $name, $default, $params, $content) {
        if($name == 'youtube') {
            if ($action == BBCODE_CHECK) {
                if (isset($params['height']) && !preg_match('/^[1-9][0-9]*$/', $params['height']))
                    return false;

                if (isset($params['width']) && !preg_match('/^[1-9][0-9]*$/', $params['width']))
                    return false;

                if (isset($params['autoplay']) && !preg_match('/^[0-1]*$/', $params['autoplay']))
                    return false;

                if (isset($params['start']) && !preg_match('/^[1-9][0-9]*$/', $params['start']))
                    return false;

                return true;
            }

            $width = isset($params['width']) ? $params['width'] : 640;
            $height = isset($params['height']) ? $params['height'] : 385;
            $autoplay = isset($params['autoplay']) ? $params['autoplay'] : 0;
            $start = isset($params['start']) ? $params['start'] : 0;

            return '<iframe class="youtube-player" type="text/html" width="' . $width . '" height="' .
                $height . '" src="http://www.youtube.com/embed/' . $content .
                ($autoplay ? '?autoplay=1' : '')
                .($autoplay && $start ? '&start='.$start : '')
                .(!$autoplay && $start ? '?start='.$start : '')
                . '" frameborder="0"></iframe>';
        }

        return $content;
    }

    /**
     * DivX BBCode callback for NBBC
     * @param $bbcode
     * @param $action
     * @param $name
     * @param $default
     * @param $params
     * @param $content
     * @return bool|string
     */
    public static function callback_divx($bbcode, $action, $name, $default, $params, $content) {
        if($name == 'divx') {
            if ($action == BBCODE_CHECK) {
                if (isset($params['height']) && !preg_match('/^[1-9][0-9]*$/', $params['height']))
                    return false;

                if (isset($params['width']) && !preg_match('/^[1-9][0-9]*$/', $params['width']))
                    return false;

                if (isset($params['autoplay']) && !preg_match('/^[0-1]*$/', $params['autoplay']))
                    return false;

                return true;
            }

            $width = isset($params['width']) ? $params['width'] : 640;
            $height = isset($params['height']) ? $params['height'] : 385;
            $autoplay = isset($params['autoplay']) ? $params['autoplay'] : 0;

            return '<object classid="clsid:'.common::guid().'" width="' . $width . '" height="' . $height . '" wmode="opaque" codebase="http://go.divx.com/plugin/DivXBrowserPlugin.cab">'
            . '<param name="custommode" value="none" /><param name="autoPlay" value="'.($autoplay ? 'true' : 'false').'" /><param name="src" value="'.$content.'" />'
            . '<embed type="video/divx" src="'.$content.'" custommode="none" width="' . $width . '" height="' . $height . '" autoPlay="'.($autoplay ? 'true' : 'false')
                .'" pluginspage="http://go.divx.com/plugin/download/"></embed></object>';
        }

        return $content;
    }

    /**
     * Video BBCode HTML 5 callback for NBBC
     * @param $bbcode
     * @param $action
     * @param $name
     * @param $default
     * @param $params
     * @param $content
     * @return bool|string
     */
    public static function callback_video($bbcode, $action, $name, $default, $params, $content) {
        if($name == 'video') {
            if ($action == BBCODE_CHECK) {
                if (isset($params['height']) && !preg_match('/^[1-9][0-9]*$/', $params['height']))
                    return false;

                if (isset($params['width']) && !preg_match('/^[1-9][0-9]*$/', $params['width']))
                    return false;

                if (isset($params['autoplay']) && !preg_match('/^[0-1]*$/', $params['autoplay']))
                    return false;

                return true;
            }

            $width = isset($params['width']) ? $params['width'] : 320;
            $height = isset($params['height']) ? $params['height'] : 240;
            $autoplay = isset($params['autoplay']) ? $params['autoplay'] : 0;

            return '<video width="'.$width.'" height="'.$height.'" controls preload="metadata"'.($autoplay ? ' autoplay' : '')
                .'><source src="'.$content.'" type="video/mp4">'._error_no_html5_vid.'</video>';
        }

        return $content;
    }

    /**
     * Vimeo BBCode callback for NBBC
     * @param $bbcode
     * @param $action
     * @param $name
     * @param $default
     * @param $params
     * @param $content
     * @return bool|string
     */
    public static function callback_vimeo($bbcode, $action, $name, $default, $params, $content) {
        if($name == 'vimeo') {
            if ($action == BBCODE_CHECK) {
                if (isset($params['height']) && !preg_match('/^[1-9][0-9]*$/', $params['height']))
                    return false;

                if (isset($params['width']) && !preg_match('/^[1-9][0-9]*$/', $params['width']))
                    return false;

                if (isset($params['autoplay']) && !preg_match('/^[0-1]*$/', $params['autoplay']))
                    return false;

                return true;
            }

            $width = isset($params['width']) ? $params['width'] : 640;
            $height = isset($params['height']) ? $params['height'] : 297;
            $autoplay = isset($params['autoplay']) ? $params['autoplay'] : 0;

            return '<iframe src="https://player.vimeo.com/video/'.$content.'?autoplay='.
                ($autoplay ? '1' : '0').'&color=ffffff" width="'.$width.'" height="'.$height.
                '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        }

        return $content;
    }

    /**
     * Golem.de BBCode callback for NBBC
     * @param $bbcode
     * @param $action
     * @param $name
     * @param $default
     * @param $params
     * @param $content
     * @return bool|string
     */
    public static function callback_golem($bbcode, $action, $name, $default, $params, $content) {
        if($name == 'golem') {
            if ($action == BBCODE_CHECK) {
                if (isset($params['height']) && !preg_match('/^[1-9][0-9]*$/', $params['height']))
                    return false;

                if (isset($params['width']) && !preg_match('/^[1-9][0-9]*$/', $params['width']))
                    return false;

                if (isset($params['autoplay']) && !preg_match('/^[0-1]*$/', $params['autoplay']))
                    return false;

                return true;
            }

            $width = isset($params['width']) ? $params['width'] : 480;
            $height = isset($params['height']) ? $params['height'] : 270;
            $autoplay = isset($params['autoplay']) ? $params['autoplay'] : 0;

            return "<object width=\"".$width."\" height=\"".$height."\" wmode=\"opaque\"></param><param name=\"wmode\" value=\"opaque\">"
            . "<param name=\"movie\" value=\"http://video.golem.de/player/videoplayer.swf?id=".$content."&autoPl=".($autoplay ? 'true' : 'false')."\"></param><param name=\"allowFullScreen\" value=\"true\">"
            . "</param><param name=\"AllowScriptAccess\" value=\"always\"><embed src=\"http://video.golem.de/player/videoplayer.swf?id=".$content."&autoPl=".($autoplay ? 'true' : 'false')."\" "
            . "type=\"application/x-shockwave-flash\" allowfullscreen=\"true\" AllowScriptAccess=\"always\" width=\"".$width."\" height=\"".$height."\"></embed></object>";
        }

        return $content;
    }

    /**
     * Hide BBCode Tag callback for NBBC
     * @param $bbcode
     * @param $action
     * @param $name
     * @param $default
     * @param $params
     * @param $content
     * @return bool|string
     */
    public static function callback_hide($bbcode, $action, $name, $default, $params, $content) {
        if($name == 'hide') {
            if ($action == BBCODE_CHECK) {
                if (isset($params['level']) && !preg_match('/^[1-9]*$/', $params['level']))
                    return false;

                return true;
            }

            $level = isset($params['level']) ? $params['level'] : 1;
            return common::$chkMe >= $level ? $content : '';
        }

        return $content;
    }

    /*
     * ##################################
     * Side Functions
     * ##################################
     */

    /**
     * Badword Filter
     */
    private static function badword_filter() {
        if(empty(self::$words) || !is_array(self::$words)) {
            self::$words = trim(settings::get('badwords', true));
            if(empty(self::$words)) return;
            self::$words = explode(",",self::$words);
        }

        if(count(self::$words) >= 1) {
            foreach(self::$words as $word) {
                self::$string = preg_replace_callback("#".$word."#i",
                    create_function('$matches','return str_repeat("*", strlen($matches[0]));'),self::$string);
            } unset($word);
        }
    }

    /**
     * BBCodes in HTML Tags umwandeln
     * @param string $input
     * @param bool $decode
     * @param bool $htmlentities
     * @return string
     */
    public static function parse_html(string $input,bool $decode = true) {
        self::$string = ($decode ? stringParser::decode($input) : $input);
        unset($input);

        //Check of empty input
        if(empty(self::$string))
            return self::$string;

        //Filter Badwords
        self::badword_filter();

        //Use BBCode
        return self::getInstance()->Parse(self::$string);
    }

    /**
     * Textteil in ein Zitat setzen * blockquote *
     * @param string $nick,string $zitat,
     * @return string (html-code)
     */
    public static function zitat($nick,$zitat) {
        $search  = array(chr(145),chr(146),"'",chr(147),chr(148),chr(10),chr(13));
        $replace = array(chr(39),chr(39),"&#39;",chr(34),chr(34)," "," ");
        $zitat = preg_replace("#[\n\r]+#", "<br />", str_replace($search, $replace, $zitat));
        return '<br /><br /><br /><blockquote><b>'.$nick.' '._wrote.':</b><br />'.stringParser::decode($zitat).'</blockquote>';
    }

    public static function nletter($txt)
    { return '<style type="text/css">p { margin: 0px; padding: 0px; }</style>'.$txt; }


    /**
     * @param string $txt
     * @return mixed
     */
    public static function bbcode_email(string $txt) {
        return str_replace(["&#91;","&#93;"],
            ["[","]"],self::parse_html((string)$txt));
    }

    /**
     * Get NBBC Instance
     * @return BBCode|null
     */
    public static final function getInstance() {
        if (self::$BBCode instanceof BBCode) {
            return self::$BBCode;
        }

        self::__construct();
        return self::$BBCode;
    }
}