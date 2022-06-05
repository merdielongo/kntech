<?php

namespace App\Observers;

use App\Models\Owner;

class OwnerObserver
{
    /**
     * Handle the Owner "created" event.
     *
     * @param  \App\Models\Owner  $owner
     * @return void
     */
    public function created(Owner $owner)
    {
        if(substr($owner->kn_id, 0, 2) == 'OW' && $owner->kn_id != null) {
            $owner->kn_id = 'OW-'. $owner->kn_id;
            $owner->save();
        }
    }

    /**
     * Handle the Owner "updated" event.
     *
     * @param  \App\Models\Owner  $owner
     * @return void
     */
    public function updated(Owner $owner)
    {
        if($owner->is_active == false && $owner->authorization) {
            $owner->status = 'disabled';
            $owner->authorization = false;
            $owner->save();
        }
    }

    /**
     * Handle the Owner "deleted" event.
     *
     * @param  \App\Models\Owner  $owner
     * @return void
     */
    public function deleted(Owner $owner)
    {
        //
    }

    /**
     * Handle the Owner "restored" event.
     *
     * @param  \App\Models\Owner  $owner
     * @return void
     */
    public function restored(Owner $owner)
    {
        //
    }

    /**
     * Handle the Owner "force deleted" event.
     *
     * @param  \App\Models\Owner  $owner
     * @return void
     */
    public function forceDeleted(Owner $owner)
    {
        //
    }
}
