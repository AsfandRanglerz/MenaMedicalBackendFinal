@component('mail::message')
    <div style="text-align:center;">
        <h3>Welcome to Mena Medical Research</h3>
    </div>
    <div>
        <p>Dear Admin,</p>
        <p>
        You have new quotation request from {{$data['first_name'] $data['last_name']}}.
    </p>
    </div>
    <div>
        <div style="padding-top: 10px">
            Thanks,<br>
            Mena Medical Research
        </div>
    </div>
@endcomponent
