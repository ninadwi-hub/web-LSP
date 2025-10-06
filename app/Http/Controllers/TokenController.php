<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use Illuminate\Support\Str;

class TokenController extends Controller
{
    public function index()
    {
        $tokens = Token::latest()->paginate(15);
        // arahkan ke sa/Tokens/index.blade.php
        return view('sa.tokens.index', compact('tokens'));
    }

    public function generate()
    {
        for ($i = 0; $i < 15; $i++) {
            do {
                $t = Str::random(10);
            } while (Token::where('token', $t)->exists());

            Token::create(['token' => $t]);
        }

        return redirect()->route('sa.tokens.index')->with('success', '15 token berhasil dibuat.');
    }

    public function destroy($id)
    {
        $token = Token::findOrFail($id);
        $token->delete();

        return redirect()->route('sa.tokens.index')->with('success', 'Token berhasil dihapus.');
    }
}
