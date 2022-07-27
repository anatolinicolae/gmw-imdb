<?php

namespace App\Observers;

use App\Models\Character;

class CharacterObserver
{
    /**
     * Handle the Character "creating" event.
     *
     * @param  \App\Models\Character  $character
     * @return void
     */
    public function creating(Character $character)
    {
        // Fix height
        if ($character->height === 'unknown') $character->height = null;
        if (is_string($character->height)) $character->height = intval($character->height);

        // Fix mass
        if ($character->mass === 'unknown') $character->mass = null;
        if (is_string($character->mass)) $character->mass = intval($character->mass);
    }

    /**
     * Handle the Character "updated" event.
     *
     * @param  \App\Models\Character  $character
     * @return void
     */
    public function updated(Character $character)
    {
        //
    }

    /**
     * Handle the Character "deleted" event.
     *
     * @param  \App\Models\Character  $character
     * @return void
     */
    public function deleted(Character $character)
    {
        //
    }

    /**
     * Handle the Character "restored" event.
     *
     * @param  \App\Models\Character  $character
     * @return void
     */
    public function restored(Character $character)
    {
        //
    }

    /**
     * Handle the Character "force deleted" event.
     *
     * @param  \App\Models\Character  $character
     * @return void
     */
    public function forceDeleted(Character $character)
    {
        //
    }
}
