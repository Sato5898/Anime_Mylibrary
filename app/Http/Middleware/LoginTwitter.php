<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;

class LoginTwitter {
    /**
     * Twitterログイン保持チェック
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        if (!$request->session()->get('twitter_id')) {
            return redirect()->route('twitter.mypage.login');
        }
        return $next($request);
    }
}