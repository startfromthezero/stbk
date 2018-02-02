<?php

namespace App\Listeners;

use App\Events\newsViewEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Session;

class newsViewListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  newsViewEvent  $event
     * @return void
     */
    public function handle(newsViewEvent $event)
    {
        $new = $event->new;
        $new->increment('view_count');
        //�鿴�Ƿ������
//        if (!$this->hasViewedNew($new))
//        {
//            //���û����� �� �������1
//            $new->increment('view_count');
//            //��������֮�󽫱��浽Session
//            $this->storeViewedNew($new);
//        }
    }

    //��������Ƿ������
    public function hasViewedNew($new)
    {
        return array_key_exists($new->id, $this->getViewedNew($new));
    }

    //�����������ȡsession����������¼
    public function getViewedNew($new)
    {
        return Session::get('viewed_new', []);
    }

    //�����һ����� ����session
    public function storeViewedNew($new)
    {
        $key = 'viewed_new.' . $new->id;
        Session::put($key, time());
    }
}
