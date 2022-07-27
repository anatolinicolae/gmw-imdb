<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Models\Character;
use Illuminate\Support\Facades\Storage;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $characters = Character::all();

        return view('characters.index', [
            'characters' => $characters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): \Illuminate\Http\Response
    {
        dd('$character');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCharacterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCharacterRequest $request): \Illuminate\Http\Response
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Character $character
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Character $character): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('characters.show', [
            'character' => $character
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Character $character
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Character $character): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('characters.edit', [
            'character' => $character
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCharacterRequest $request
     * @param \App\Models\Character $character
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateCharacterRequest $request, Character $character): \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        // Delete old file on demand
        if ($request->get('delete_old_picture') !== 'no')
        {
            Storage::delete($character->picture);
        }

        // Upload new file
        if ($request->has('picture') && !empty($request->file('picture')))
        {
            $path = $request->file('picture')->store('avatars');
        }

        $character->update([
            ...$request->all(),
            'picture' => $path ?? null,
        ]);

        return redirect(route('characters.show', $character));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Character $character
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Character $character): \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $character->delete();
        return redirect(route('characters.index'));
    }
}
