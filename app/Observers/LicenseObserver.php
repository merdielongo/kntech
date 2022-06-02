<?php

namespace App\Observers;

use App\Models\License;

class LicenseObserver
{
    /**
     * Handle the License "created" event.
     *
     * @param  \App\Models\License  $license
     * @return void
     */
    public function created(License $license)
    {
        //
    }

    /**
     * Handle the License "updated" event.
     *
     * @param  \App\Models\License  $license
     * @return void
     */
    public function updated(License $license)
    {
        if($license->label == null) {
            $license->label = 'LC-'. $license->kn_id;
            $license->save();
        }
    }

    /**
     * Handle the License "deleted" event.
     *
     * @param  \App\Models\License  $license
     * @return void
     */
    public function deleted(License $license)
    {
        //
    }

    /**
     * Handle the License "restored" event.
     *
     * @param  \App\Models\License  $license
     * @return void
     */
    public function restored(License $license)
    {
        //
    }

    /**
     * Handle the License "force deleted" event.
     *
     * @param  \App\Models\License  $license
     * @return void
     */
    public function forceDeleted(License $license)
    {
        //
    }
}
