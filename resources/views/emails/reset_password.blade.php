@component('mail::message')
    <div style="text-align:center;">
        <h3>Welcome to Mena Medical Research</h3>
    </div>
    <div>
        <p>Dear Admin,</p>
        <p>We have received a request to reset your password.
            Please click the button below to reset your password:</p>
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $detail['url'] }}" target="_blank" rel="noopener noreferrer"
                style="
            background-color: #326a9d;
            color: white;
            padding: 9px 17px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            display: inline-block;
            font-size: 16px;
            ">
                Reset Password
            </a>
        </div>
    </div>
    <div>
        <div style="padding-top: 10px">
            Thanks,<br>
            Mena Medical Research
        </div>
    </div>
@endcomponent
