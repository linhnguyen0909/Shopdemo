<?php

namespace App\Transformers;

use App\Models\Contact;
use Carbon\Carbon;
use Flugg\Responder\Transformers\Transformer;

class ContactTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  \App\Models\Contact $contact
     * @return array
     */
    public function transform(Contact $contact)
    {
        return [
            'id' => (string) $contact->id,
            'user_id' => (string) $contact->user_id,
            'first_name ' => (string) $contact->first_name,
            'last_name' => (string) $contact->last_name,
            'email ' => (string) $contact->email,
            'birthday' => (string) $contact->birthday,
            'job_title ' => (string) $contact->job_title,
            'city' => (string) $contact->city,
            'country' => (string) $contact->country,
            'age'=>Carbon::parse($contact->birthday)->age,
            'created_at' => $contact->created_at,
            'updated_at' => $contact->updated_at,
            'deleted_at' => $contact->deleted_at,
        ];
    }
}
