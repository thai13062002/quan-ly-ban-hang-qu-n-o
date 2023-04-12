<?php

namespace App\Jobs;

use App\Mail\MailSale;
use App\Models\NewsletterHistory;
use App\Services\Admin\NewsletterHistoryService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SenMailSale implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $newsletter;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $newsletter)
    {
        $this->email = $email;
        $this->newsletter = $newsletter;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $mail = new MailSale($this->newsletter);
            Mail::bcc($this->email)->send($mail);
        } catch (\Exception $e) {
            Log::error('Error sending email: ' . $e->getMessage());
            throw $e;
        }
    }
}
