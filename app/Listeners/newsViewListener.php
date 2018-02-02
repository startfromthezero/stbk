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
        //查看是否被浏览过
//        if (!$this->hasViewedNew($new))
//        {
//            //最近没有浏览 则 浏览数加1
//            $new->increment('view_count');
//            //看过文章之后将保存到Session
//            $this->storeViewedNew($new);
//        }
    }

    //文章最近是否被浏览过
    public function hasViewedNew($new)
    {
        return array_key_exists($new->id, $this->getViewedNew($new));
    }

    //如果浏览过则获取session存入的浏览记录
    public function getViewedNew($new)
    {
        return Session::get('viewed_new', []);
    }

    //最近第一次浏览 存入session
    public function storeViewedNew($new)
    {
        $key = 'viewed_new.' . $new->id;
        Session::put($key, time());
    }
}
