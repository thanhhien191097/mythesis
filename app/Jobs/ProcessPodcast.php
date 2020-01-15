<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\TestAction;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;



class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $htmla;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($html)
    {
        $this->htmla = $html;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // export pdf
        $fileName = 'Hienfile' . date("-dm-hhmmss",time());
        PDF::loadHtml($this->htmla)->save(public_path("export/{$fileName}.pdf"));
        Storage::disk('s3')->putFile('files', new File(public_path("export/{$fileName}.pdf")));



        \Mail::send([], [], function($message) use ($fileName){
            $message->setBody('export pdf','text/html');
            // $message->setBody(view(formemail.php),'text/html');
            $message->subject( 'File pdf' );
            $message->from('hien.bui@bigin.top', "CV Builder");  //phai la domain bigin.top
            $message->to([
             'buingoc.thanhhien97@gmail.com',
            ]);
            $message->attach(public_path("export/{$fileName}.pdf"), [
                'as' => "{$fileName}.pdf",
                'mine' => 'pdf' // file type
            ]);
        });

        $fail = \Mail::failures();
            if (!empty($fail)) {
                $error = 'Could not send message to ' . $fail[0];
                \Log::info($error);
            }
    }
}
