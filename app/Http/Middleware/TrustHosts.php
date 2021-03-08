<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;
use Illuminate\Http\Request;

class TrustHosts extends Middleware
{
    public function handle(Request $request, $next)
    {
        // check the ip adress
        $ip = $request->ip();
        $hosts = $this->hosts();
        foreach ($hosts as $host) {
            if (!$host) continue;
            if (preg_match("/" . $host . "/", $ip)) {
                return $next($request);
            }
        }
        return response()->json(['Your ip address is not valid.']);
    }

    protected function shouldSpecifyTrustedHosts()
    {
        return true;
    }

    /**
     * Get the host patterns that should be trusted.
     *
     * @return array
     */
    public function hosts()
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
            $this->app['config']->get('app.url'),
            $this->app['config']->get('app.frontendUrl'),
            "127.0.0.1"
        ];
    }
}
