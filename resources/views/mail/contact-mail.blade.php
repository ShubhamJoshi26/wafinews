<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('frontend.Contact') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>
<body>
    @if ($type=='visitor')
        <p><h4><b>Dear {{$msg['name']}}</b></h4> Thank you for reaching out to us with your inquiry. We truly appreciate your interest and are here to assist you in any way we can.
            <br>
            Our team is reviewing your request and will get back to you promptly with the information you need. In the meantime, if you have any further questions or need immediate assistance, please feel free to contact us at [+91 - 9315769585] or [info@wafinews.com].
            <br>
            We look forward to helping you!</p>
    @elseif ($type=='admin')
            <h3><b>Dear Admin,</b><br></h3><p>the following enquiry received:</p>
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{$msg['name']}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$msg['email']}}</td>
                    </tr>
                    <tr>
                        <th>message</th>
                        <td>{{$msg['message']}}</td>
                    </tr>
                </tbody>
            </table>
    @endif
</body>
</html>
