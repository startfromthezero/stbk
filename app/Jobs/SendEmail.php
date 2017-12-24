<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        //
		$this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
		Mail::raw("爱你哦", function ($message) {
			$message->from('v_shtzhu@163.com', '一个帅得一塌糊涂的男人');
			$message->subject('我只想跟你说三国字', '测试');
			$message->to($this->email);
		});
		//Log::warning('已发送邮件-'. $this->email);

    }
}
