<?php

namespace App\Http\Controllers;

use App\Services\EmailsService;
use Inertia\Inertia;
use App\Models\Email;
use Inertia\Response;

class MailController extends Controller
{
    public function index()
    {
        return $this->getEmails();
    }

    public function show(Email $email)
    {
        return Inertia::render('Show', [
            'email' => $email,
        ]);
    }

    public function fetch()
    {
        EmailsService::fetch();

        return $this->getEmails();
    }

    /**
     * @return Response
     */
    public function getEmails(): Response
    {
        $page = request()->input('page', 1);
        $per_page = request()->input('per_page', 10);

        return Inertia::render('Emails', [
            'emails' => Email::orderByDesc('id')->paginate($per_page, ['*'], 'page', $page),
        ]);
    }
}
