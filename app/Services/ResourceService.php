<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ResourceService implements ResourceServiceInterface
{
    protected const ERROR_MESSAGE = 'Unauthorized! Сheck credentials!';

    /**
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function setSessionAccessToken()
    {
        try {
            $response = Http::asForm()->post(config('credentials.pentagon.url'), [
                'client_id' => config('credentials.pentagon.client_id'),
                'client_secret' => config('credentials.pentagon.client_secret'),
            ]);

            if ($response->status() !== 401) {
                session(
                    ['token' => $response->json()['access_token']]
                );
            }

            return redirect()
                ->back()
                ->with('error', self::ERROR_MESSAGE);

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * @return Response
     */
    public function getFeed(): Response
    {
        return Http::asForm()
            ->withToken(session()->get('token'))
            ->get(config('credentials.pentagon.feed_url'));
    }
}
