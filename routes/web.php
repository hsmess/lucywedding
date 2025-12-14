<?php

use App\Models\Guest;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\WorkOS\Http\Middleware\ValidateSessionWithWorkOS;

Route::get('/', function(\Illuminate\Http\Request $request){
    $invitation =  \App\Models\Invitation::with('guests')->where('code', $request->invitation_code)->first();
    return Inertia::render('Home',
        [
            'code' => $request->invitation_code ?? null,
            'people' => $invitation?->guests->map(fn($guest) => $guest->toArray())
        ]);
});





//Route::middleware([
//    'auth',
//    ValidateSessionWithWorkOS::class,
//])->group(function () {
//    ->name('dashboard');
//});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';


Route::post('/api/rsvp/{code}', function ($code, \Illuminate\Http\Request $request) {
    $invitation = \App\Models\Invitation::where('code', $code)->firstOrFail();

    collect($request->guests)->each(function($guest) use ($invitation) {
        if(isset($guest['id']) && $guest['id']) {
            // Update existing guest
            \App\Models\Guest::find($guest['id'])->update([
                'attending' => $guest['attending'],
                'dietary_requirements' => $guest['dietary_requirements'] ?? null,
                'song_request' => $guest['song_request'] ?? null,
                'other_comments' => $guest['other_comments'] ?? null,
            ]);
        } else {
            // Create new plus one and link it to parent
            $newGuest = \App\Models\Guest::create([
                'invitation_id' => $invitation->id,
                'name' => $guest['name'],
                'has_plus_one' => false,
                'attending' => $guest['attending'] ?? true,
                'dietary_requirements' => $guest['dietary_requirements'] ?? null,
                'song_request' => $guest['song_request'] ?? null,
                'other_comments' => $guest['other_comments'] ?? null,
            ]);

            // Update parent guest with the new plus one ID
            if(isset($guest['plus_one_id'])) {
                \App\Models\Guest::find($guest['plus_one_id'])->update([
                    'plus_one_id' => $newGuest->id
                ]);
            }
        }
    });

    return response()->json(['message' => 'RSVP submitted successfully']);
});

Route::get('/dashboard', function ($code) {dd('test');})->name('dashboard');
