<?php

defined('DS') or define('DS', DIRECTORY_SEPARATOR);

/**
 * @param $key
 * @param bool $default
 * @param bool $explode
 * @return array|bool|mixed
 */
function config($key, $default = false, $explode = false)
{
    return configApp(basename(RABINT_APP_DIR), $key, $default, $explode);
}


/**
 * @param $app
 * @return array
 */
function getEnvConfigs($app)
{
    static $envCache = false;
    if (!isset($envCache[$app])) {

//        if (RABINT_ENV == 'test') {
//            $app_env = 'test';
//        }elseif (file_exists(RABINT_BASE_DIR . '/' . $app . '/env.php')) {
//            $app_env = require RABINT_BASE_DIR . '/' . $app . '/env.php';
//        } else {
//            $app_env = require RABINT_BASE_DIR . '/env.php';
//        }

        $app_env = RABINT_ENV;

        $appEnvFile = RABINT_BASE_DIR . '/' . $app . '/_env/' . $app_env . '.php';
        $appBaseEnvFile = RABINT_BASE_DIR . '/' . $app . '/_env/base_env.php';
        $commonEnvFile = RABINT_BASE_DIR . '/_env/' . $app_env . '.php';
        $baseEnvFile = RABINT_BASE_DIR . '/_env/base_env.php';

        if (file_exists($appEnvFile) && file_exists($commonEnvFile)) {
            $envCache[$app] = config_deep_merge(include($commonEnvFile), include($appEnvFile));
        } elseif (file_exists($appEnvFile)) {
            $envCache[$app] = include($appEnvFile);
        } else {
            $envCache[$app] = include($commonEnvFile);
        }
        /**
         * merge with base
         */
        if (file_exists($appBaseEnvFile)) {
            $envCache[$app] = config_deep_merge(include($appBaseEnvFile), $envCache[$app]);
        }
        $envCache[$app] = config_deep_merge(include($baseEnvFile), $envCache[$app]);
    }
    return $envCache[$app];
}

function configApp($app, $key, $default = false, $explode = false)
{
    /**
     * caching
     */
    static $cache = [];

    if (isset($cache[$app . $key])) {
        return $cache[$app . $key];
    }

    $env = getEnvConfigs($app);

    if (strpos($key, '.')) {
        $keys = explode('.', $key);
        $ret = $env;
        foreach ($keys as $k) {
            if (isset($ret[$k])) {
                $ret = $ret[$k];
            } else {
                return $default;
                break;

            }
        }
        $return = $ret;
    } else {
        if (isset($env[$key])) {
            $return = $env[$key];
        }
    }
    if (!isset($return)) {
        $return = $default;
    }
    /* ------------------------------------------------------ */
    if ($explode) {
        $return = explode(',', $return);
        $return = array_map('trim', $return);
    }
    $cache[$app . $key] = $return;
    return $return;
}


/**
 * @return int|string
 */
function getMyId()
{
    return Yii::$app->user->getId();
}

/**
 * @param array $uri
 * @return string
 */
function combineParsedUrl($uri = [])
{
    $return = '';

    $return .= isset($uri['scheme']) ? $uri['scheme'] . "://" : "";

    $return .= isset($uri['user']) ? $uri['user'] : "";
    $return .= isset($uri['pass']) ? ":" . $uri['pass'] : "";
    $return .= (isset($uri['user']) or isset($uri['pass'])) ? "@" : "";

    $return .= isset($uri['host']) ? $uri['host'] : "";
    $return .= isset($uri['path']) ? $uri['path'] : "";
    $return .= isset($uri['query']) ? "?" . http_build_query($uri['query']) : "";
    $return .= isset($uri['fragment']) ? "#" . 'fragment' : "";
    return $return;
}

/**
 * @param array $uri
 * @return string
 */
function appHostInfo($uri)
{
    if (isset($uri['host'])) {
        $return = isset($uri['scheme']) ? $uri['scheme'] . "://" : "http://";
        $return .= $uri['host'];
    } else {
        $return = "";
    }
    return $return;
}

/**
 * @param string $view
 * @param array $params
 * @return string
 */
function render($view, $params = [])
{
    return Yii::$app->controller->render($view, $params);
}

/**
 * @param $url
 * @param int $statusCode
 * @return \yii\web\Response
 */
function redirect($url)
{
//    return Yii::$app->controller->redirect($url, $statusCode);
    if (is_array($url) && isset($url[0])) {
// ensure the route is absolute
        $url[0] = '/' . ltrim($url[0], '/');
    }
    $url = yii\helpers\Url::to($url);
    if (strpos($url, '/') === 0 && strpos($url, '//') !== 0) {
        $url = Yii::$app->getRequest()->getHostInfo() . $url;
    }
    if (headers_sent()) {
        echo '<META http-equiv="refresh" content="0;URL=' . $url . '">';
    } else {
        header("location: $url");
    }
    die();
}

function homeUrl()
{
    return Yii::$app->homeUrl;
}

function url($url = '', $scheme = false)
{
    return \yii\helpers\Url::to($url, $scheme);
}

function config_deep_merge($a, $b)
{
    $args = func_get_args();
    $res = array_shift($args);
    while (!empty($args)) {
        $next = array_shift($args);
        foreach ($next as $k => $v) {
//            if ($v instanceof UnsetArrayValue) {
//                die('p----');
//                unset($res[$k]);
//            } elseif ($v instanceof ReplaceArrayValue) {
//                die('p----');
//                $res[$k] = $v->value;
//            } else
            if (is_int($k)) {
                if (isset($res[$k])) {
                    $res[] = $v;
                } else {
                    $res[$k] = $v;
                }
            } elseif (is_array($v) && isset($res[$k]) && is_array($res[$k])) {
                $res[$k] = config_deep_merge($res[$k], $v);
            } else {
                $res[$k] = $v;
            }
        }
    }
//
    return $res;
}

function userCanDebug($debugersIp)
{
    if (empty($debugersIp)) {
        return false;
    }
    $debugersIp = explode(',', $debugersIp);
    $debugersIp = array_map(function ($item) {
        return trim($item);
    }, $debugersIp);

    $ip = getRealUserIp();
    if (in_array($ip, $debugersIp)) {
        return true;
    }
    return false;
}

function getRealUserIp()
{
    if ($isCLI = (php_sapi_name() == 'cli')) {
        return "";
    }
    if (isset($_SERVER['HTTP_X_REAL_IP'])) {
        return $_SERVER['HTTP_X_REAL_IP'];
    }
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $_SERVER['REMOTE_ADDR'];
}


function pr($str, $exit = false)
{
    echo "<pre>";
    print_r($str);
    echo "</pre>";
    if ($exit) {
        exit;
    }
}

function debug($str, $exit = false)
{
    echo "<pre>";
    var_dump($str);
    echo "</pre>";
    if ($exit) {
        exit;
    }
}


function modulesPath($postfix = "", $returnOnlyExists = true)
{
    $apps = include __DIR__ . '/config/apps.php';

    $return = [];
    /**
     * ineer modules
     */
    $modules = include RABINT_APP_DIR . '/config/modules.php';
    foreach ($modules as $name => $class) {
        $moduleDir = substr($class['class'], 0, 1 + strrpos($class['class'], '\\'));
        foreach ($apps as $appKey => $appData) {
            $moduleDir = str_replace($appKey.'\\', RABINT_BASE_DIR . '/'.$appKey.'/', $moduleDir);
        }
        $moduleDir = str_replace('\\', '/', $moduleDir);
        $moduleDir .= $postfix;
        if (!$returnOnlyExists) {
            $return[] = $moduleDir;
        } else if (file_exists($moduleDir)) {
            $return[] = $moduleDir;
        }
    }
    /**
     * vendor modules
     */
    $autoloadFile = include dirname(__DIR__) . '/vendor/composer/autoload_psr4.php';
    foreach ($modules as $name => $class) {
        $moduleNamespase = substr($class['class'], 0, 1 + strrpos($class['class'], '\\'));
        if (isset($autoloadFile[$moduleNamespase])) {
            foreach ($autoloadFile[$moduleNamespase] as $mns) {
                if (file_exists($mns)) {
                    $moduleDir = $mns;
                }
            }
        } else {
            $moduleDir = $moduleNamespase;
        }
        $moduleDir .= '/' . $postfix;
        if (!$returnOnlyExists) {
            $return[] = $moduleDir;
        } else if (file_exists($moduleDir)) {
            $return[] = $moduleDir;
        }
    }
    return $return;
}


function vd($str, $exit = false)
{
    echo "<pre>";
    var_dump($str);
    echo "</pre>";
    if ($exit) {
        exit;
    }
}

function explode_options($string, $delimiter = ',')
{
    return explode($delimiter, $string);
}

/**
 * @param $str
 * @param null $file_path full file path
 * @param string $separator
 * @return false|int
 */
function prf($str,$filename='flog.log',$filepath=null,$separator="\n"){

    if(empty($filepath)){
        $filepath = Yii::getAlias("@runtime");
    }
    $filepath .='/'.$filename;
    if(!is_string($str)){
        $str = var_export($str,1);
    }
    $comment = date("Y-m-d H:i:s") . " | " . $str . "\n";
    return file_put_contents($filepath, $comment, FILE_APPEND);
}