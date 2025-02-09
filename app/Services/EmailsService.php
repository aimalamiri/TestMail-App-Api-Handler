<?php

namespace App\Services;

use App\Models\Email;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class EmailsService
{
    public static function fetch()
    {
        $testMailUrl = config('services.test_mail.url');
        $testMailApiKey = config('services.test_mail.key');
        $testMailNamespace = config('services.test_mail.namespace');

        $response = Http::get($testMailUrl, [
            'apikey' => $testMailApiKey,
            'namespace' => $testMailNamespace,
            'headers' => 'true',
        ]);

        $emails = $response->json();

        foreach ($emails['emails'] as $email) {
            $date = Carbon::parse($email['date'])->toDateTimeString();
            Email::firstOrCreate([
                'email_id' => $email['id'],
            ], [
                'name' => $email['from_parsed'][0]['name'] ?? null,
                'from' => $email['from_parsed'][0]['address'] ?? null,
                'to' => $email['to_parsed'][0]['address'] ?? null,
                'subject' => $email['subject'],
                'text' => $email['text'],
                'html' => $email['html'] ?? null,
                'date' => $date,
                'headers' => $email['headers'],
            ]);
        }
    }
}
