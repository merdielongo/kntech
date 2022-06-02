<?php

namespace App\Observers;

use App\Models\Offer;

class OfferObserver
{
    /**
     * Handle the Offer "created" event.
     *
     * @param  \App\Models\Offer  $offer
     * @return void
     */
    public function created(Offer $offer)
    {
        //
    }

    /**
     * Handle the Offer "updated" event.
     *
     * @param  \App\Models\Offer  $offer
     * @return void
     */
    public function updated(Offer $offer)
    {
        if($offer->is_active == false && $offer->is_publish) {
            $offer->is_publish = false;
            $offer->status = 'disabled';
            $offer->save();
        }
    }

    /**
     * Handle the Offer "deleted" event.
     *
     * @param  \App\Models\Offer  $offer
     * @return void
     */
    public function deleted(Offer $offer)
    {
        //
    }

    /**
     * Handle the Offer "restored" event.
     *
     * @param  \App\Models\Offer  $offer
     * @return void
     */
    public function restored(Offer $offer)
    {
        //
    }

    /**
     * Handle the Offer "force deleted" event.
     *
     * @param  \App\Models\Offer  $offer
     * @return void
     */
    public function forceDeleted(Offer $offer)
    {
        //
    }
}
