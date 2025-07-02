@component('mail::message')
    <div style="text-align:center;">
        <h3>Welcome to Mena Medical Research</h3>
    </div>
    <div>
        <p>
            You quotation request has been rejected due to following reason:
        </p>
        <p>{{$reason}}.</p>
    </div>
    <div>
        <div style="padding-top: 10px">
            Thanks,<br>
            Mena Medical Research
        </div>
    </div>
@endcomponent
