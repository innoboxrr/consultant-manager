<?php

namespace Innoboxrr\ConsultantManager\Models\Traits\Operations;

trait ConsultantOperations
{

    public function buildPayload()
    {
        return [
            'specialities' => $this->meta('specialities'),
            'region' => $this->meta('region'),

            'payouts' => [
                'currency' => $this->meta('payouts_currency'),
                'iban' => $this->meta('payouts_iban'),
                'bank_name' => $this->meta('payouts_bank_name'),
                'beneficiary' => $this->meta('payouts_beneficiary'),
                'tax_id' => $this->meta('payouts_tax_id'),
                'payment_method' => $this->meta('payouts_payment_method'),
            ],

            'credentials' => $this->meta('credentials', '[]'), // array [{ name, number, expires_at }]
            'documents' => $this->meta('documents', '[]'),     // array [{ type, url, verified }]

            'profile' => [
                'summary' => $this->meta('profile_summary'),
                'rating' => $this->meta('profile_rating'),
                'reviews_count' => $this->meta('profile_reviews_count'),
            ],
        ];
    }


    public function updatePayload()
    {

        $this->payload = $this->buildPayload();

        return $this->save();

    }

}
