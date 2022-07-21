<?php
/**
 * Created by PhpStorm.
 * User: mojtaba
 * Date: 4/9/19
 * Time: 1:24 PM
 */

namespace common;


use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;

class SecurityBootstrap implements BootstrapInterface
{

    static $globalXssFilter = true;
    static $globalBadFileFilter = true;
    static $whiteListExt = 'ogv, webm, mp4, vob, mpg, avi, mov, wmv, flv, 3gp, mp3, wav, wma, ogg, gif, png, jpg, jpeg, pdf, doc, dot, docx, dotx, pdf, m4a';
    static $blackListExt = 'php, inc, exe';
    static $whiteListMime = 'audio/ogg, video/ogg, video/mp4, audio/mp4, application/mp4, video/mpeg, audio/mpeg, video/3gpp, 
video/x-ms-vob, video/x-msvideo, video/quicktime, video/x-sgi-movie, video/x-flv, audio/x-wav, 
video/x-ms-wm, audio/x-ms-wma, video/x-ms-wmv, image/gif, image/png, image/jpeg, application/pdf, application/x-pdf, 
application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, 
application/vnd.openxmlformats-officedocument.wordprocessingml.template, application/octet-stream 
application/pdf, audio/m4a, audio/x-m4a ';
    static $blackListMime = 'application/x-php, application/x-msdownload';

    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param Application $app the application currently running
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\ForbiddenHttpException
     */
    public function bootstrap($app)
    {
        /**
         * do not check for console requests
         */
        if (Yii::$app instanceof \yii\console\Application) {
            return;
        }

        /**
         * avoid multiple run
         */
        static $isRanThisFunction = false;
        if (!$isRanThisFunction) {
            $isRanThisFunction = true;

            /**
             * global xss filter
             */
            if (self::$globalXssFilter) {
                /** get filter */
                Yii::$app->request->setQueryParams(
                    static::arrayXssClean(
                        Yii::$app->request->getQueryParams()
                    )
                );
                /** post filter */
                Yii::$app->request->setBodyParams(
                    static::arrayXssClean(
                        Yii::$app->request->getBodyParams()
                    )
                );
            }
            /**
             * global bad uploaded file filter
             */
            if (self::$globalBadFileFilter) {
                if (!empty($_FILES)) {
                    $files = $_FILES;

                    foreach ($_FILES as $key => $files) {


                        if (!is_array($files['name'])) {
                            $files['name'] = [$files['name']];
                            $files['type'] = [$files['type']];
                            $files['tmp_name'] = [$files['tmp_name']];
                            $files['error'] = [$files['error']];
                            $files['size'] = [$files['size']];
                        }
                        $files = static::rotateArray($files);
                        foreach ($files as $i => $file) {
                            $file = (object)$file;
                            if (static::checkAllowedUploadedFile($file)) {
                                throw new \yii\web\ForbiddenHttpException(\Yii::t('rabint', 'Security Exception'));
                                die();
                            }
                        }
                    }

                }
            }


//        \Yii::$app->on('afterAction', function ($event) {
//            \sahifedp\stats\stats::stat();
//        });
//        \yii\base\Event::on(\yii\web\Controller::className(), \yii\web\Controller::EVENT_AFTER_ACTION, function ($event) {
//            \sahifedp\stats\stats::stat();
//        });
//            \yii\base\Event::on(\yii\web\Response::className(), \yii\web\Response::EVENT_AFTER_SEND, function ($event) {
//                \sahifedp\stats\stats::stat();
//            });
//        \Yii::$app->view->on(\yii\web\View::EVENT_END_PAGE, function () {
//            \sahifedp\stats\stats::stat();
//        });
        }
    }

    static function rotateArray($array)
    {
        if (!empty($array)) {
            foreach ($array as $key => $value) {
                foreach ($value as $i => $val) {
                    $new[$i][$key] = $val;
                }
            }
            return $new;
        }
        return $array;
    }

    static function checkAllowedUploadedFile($file)
    {

        $fileMime = strtolower($file->type);
        $fileExt = strtolower(pathinfo($file->name, PATHINFO_EXTENSION));
        if (self::checkAllowedType($fileMime) and self::checkAllowedExt($fileExt)) {
            return true;
        }
        return false;
    }

    static function checkAllowedType($mime, $moreWhiteType = "", $moreBlackType = "")
    {
        $mime = strtolower($mime);
        /**
         * check white list ####################################################
         */
        $whiteListArray = [];
        /**
         * create white list
         */
        $whiteList = strtolower(self::$whiteListMime);
        if (!empty($whiteList)) {
            $listArray = explode(",", $whiteList);
            $listArray = array_map("trim", $listArray);
            $whiteListArray = $listArray;
        }
        if (!empty($moreWhiteType)) {
            $listArray = explode(",", strtolower($moreWhiteType));
            $listArray = array_map("trim", $listArray);
            $whiteListArray = array_merge($whiteListArray, $listArray);
        }
        /**
         * check mime in white list
         */
        if (!empty($whiteListArray) and !in_array($mime, $whiteListArray)) {
//            die("not in white type");
            return false;
        }

        /**
         * check black list ####################################################
         */
        $blackListArray = [];
        $blackList = strtolower(self::$blackListMime);
        if (!empty($blackList)) {
            $listArray = explode(",", $blackList);
            $listArray = array_map("trim", $listArray);
            $blackListArray = $listArray;
        }
        if (!empty($moreBlackType)) {
            $listArray = explode(",", strtolower($moreBlackType));
            $listArray = array_map("trim", $listArray);
            $blackListArray = array_merge($blackListArray, $listArray);
        }
        /**
         * check mime in white list
         */
        if (!empty($blackListArray) and in_array($mime, $blackListArray)) {
//            die("in black type");
            return false;
        }

//        die("type is okey");
        return true;
    }

    static function checkAllowedExt($ext, $moreWhiteExt = "", $moreBlackExt = "")
    {
        $ext = strtolower($ext);
        /**
         * check white list ####################################################
         */
        $whiteListArray = [];
        /**
         * create white list
         */
        $whiteList = strtolower(self::$whiteListExt);
        if (!empty($whiteList)) {
            $listArray = explode(",", $whiteList);
            $listArray = array_map("trim", $listArray);
            $whiteListArray = $listArray;
        }
        if (!empty($moreWhiteExt)) {
            $listArray = explode(",", strtolower($moreWhiteExt));
            $listArray = array_map("trim", $listArray);
            $whiteListArray = array_merge($whiteListArray, $listArray);
        }
        /**
         * check ext in white list
         */
        if (!empty($whiteListArray) and !in_array($ext, $whiteListArray)) {
//            die("not in white Ext");
            return false;
        }

        /**
         * check black list ####################################################
         */
        $blackListArray = [];
        $blackList = strtolower(self::$blackListExt);
        if (!empty($blackList)) {
            $listArray = explode(",", $blackList);
            $listArray = array_map("trim", $listArray);
            $blackListArray = $listArray;
        }
        if (!empty($moreBlackExt)) {
            $listArray = explode(",", strtolower($moreBlackExt));
            $listArray = array_map("trim", $listArray);
            $blackListArray = array_merge($blackListArray, $listArray);
        }
        /**
         * check ext in white list
         */
        if (!empty($blackListArray) and in_array($ext, $blackListArray)) {
//            die("in black Ext");
            return false;
        }

//        die("Ext is okey");
        return true;
    }

    public static function arrayXssClean($array, $index = null)
    {
        if (is_array($array)) {
            foreach ($array as &$value) {
                if (is_array($value)) {
                    $value = self::arrayXssClean($value);
                } else {
                    $value = \yii\helpers\HtmlPurifier::process($value);
                }
            }
        } else {
            $array = \yii\helpers\HtmlPurifier::process($array);
        }
        return $array;

    }

}