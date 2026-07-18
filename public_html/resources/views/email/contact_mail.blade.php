
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 15%;
            padding: 5px;
        }

        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>

<body>
   
    <h4>Hello Tirupati Software Admin,</h4>
    <p>We have received a new contact enquiry through our website. Here are the details:</p>
    <p><strong>Name:</strong> {{ $name ?? 'N/A' }}</p>
    <p><strong>Phone Number:</strong> {{ $phone ?? 'N/A' }}</p>
    <p><strong>Email:</strong> {{ $userEmail ?? 'N/A' }}</p>
    <p><strong>Gender:</strong> {{ $gender ?? 'N/A' }}</p>
    <p><strong>Address:</strong> {{ $address ?? 'N/A' }}</p>
    <p><strong>Country:</strong> {{ $country ?? 'N/A' }}</p>
    <p><strong>State:</strong> {{ $state ?? 'N/A' }}</p>
    <p><strong>City:</strong> {{ $citys ?? 'N/A' }}</p>
    <p><strong>Interested for:</strong> {{ $apply ?? 'N/A' }}</p>
    <p><strong>Message:</strong> {{ $messages ?? 'N/A' }}</p>
    <p>Please review the details and take the necessary action to respond to this enquiry.</p>
    <p>Thank you!</p>
</body>
</html>
