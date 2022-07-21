<?php
namespace app\widgets;

use \app\modules\event\models\Event;
use Yii;

class EventWidget extends \yii\bootstrap\Widget
{
    const ORDER_LATEST = 'latest';

    const ORDER_POPULAR = 'popular';
    const ORDER_MOST_RATE = 'rate';
    const ORDER_MOST_VISIT = 'visit';

    public $style = 'default';
    public $count = 12;
    public $order = '';
    public $time_limit = 15*86400;
    public $tag = '';
//    public $status = Event::STATUS_PUBLISH;

    /**
     * {@inheritdoc}
     */
    public function run() {
        $events = Event::find()->all();
        /* ------------------------------------------------------ */
        return $this->render('event-widget/' . $this->style, [
            'uid' => $this->getId(),
            'events' => $events,
        ]);
    }
}
