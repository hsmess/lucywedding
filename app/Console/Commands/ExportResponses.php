<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ExportResponses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-responses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $records = \App\Models\Guest::whereColumn('created_at','!=','updated_at')->get()->map(function ($guest) {
            return collect([
                'name' => $guest->name,
                'attending' => $guest->attending ? 'Yes' : 'No',
                'dietary requirements' => $guest->dietary_requirements ?? '',
                'song request' => $guest->song_request ?? '',
                'other comments' => $guest->other_comments ?? '',
                'date updated' => $guest->updated_at->format('d/m/Y')
            ]);
        });
        $headers = $records->first()->keys()->toArray();
        $path = 'export_'. Carbon::now()->format('d_m_Y_H_i') .'.csv';
        $csvPath = storage_path($path);
        $file = fopen($csvPath, 'w');

        fputcsv($file, $headers);
        $records->each(fn($row) => fputcsv($file, $row->toArray()));
        fclose($file);

        Mail::raw('Please find the guest export attached.', function ($message) use ($csvPath, $path) {
            $message->to(config('app.email'))
                ->subject('Guest Export')
                ->attach($csvPath, ['as' => $path, 'mime' => 'text/csv']);
        });

    }

    private function randomColdplaySong(){
        return "Coldplay - " . config('app.coldplay')[rand(0, count(config('app.coldplay')) - 1)];
    }
}
