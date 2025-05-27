<!-- resources/views/emails/contact-form-submission.blade.php -->
@component('mail::message')
    # New Contact Form Submission

    You have received a new message from your website contact form.

    **Name:** {{ $contact->full_name }}
    **Email:** {{ $contact->email }}
    @if($contact->phone)
        **Phone:** {{ $contact->phone }}
    @endif

    **Message:**
    {{ $contact->message }}

    @component('mail::button', ['url' => config('app.url') . '/admin/contacts/' . $contact->id])
        View in Dashboard
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
