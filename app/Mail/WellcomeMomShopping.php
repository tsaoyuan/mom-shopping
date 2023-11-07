<?php

namespace App\Mail;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class WellcomeMomShopping extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Member $member)
    {
        //
    }

    public function envelope()
    {
        // 信件標題
        return new Envelope(
            subject: 'Wellcome Mom Shopping',
        );
    }

    public function content()
    {
        // 資料傳給 blade 前自訂其格式，使用 Content 定義的 with 參數來手動將資料傳給 View
        $member = $this->member;
        return new Content(
            view: 'mail.wellcomeMomShopping',
            with:[
                'memberName' => $member->name, 
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}
