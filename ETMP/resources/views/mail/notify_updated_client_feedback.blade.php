<head>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }

        table tr th {
            text-align: center;
        }

        table td, table th {
            text-align: center;
            border: 1px solid #ddd;
            padding: 8px;
        }

        table td {
            color: black;
        }

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: rgba(76, 0, 130, 0.800);
            color: white;
        }

        table tr:hover {
            background-color: #ddd;
        }

        article {
            text-align: center;
            padding: 10px;
        }

        body {
            color: black;
        }

        footer {
            padding: 20px;
            background-color: rgb(245, 245, 245);
            text-align: center;
        }
    </style>
</head>
<body>
    <article>
        <h1>[EMTP - {{$mail_data['program_code']}} {{$mail_data['program_name']}}] Updated Client Feedback</h1>
        <h2 style="margin:20px;">Feedback Details</h2>
        <table>
            <tr>
                <th>Category</th>
                <th>Details</th>
            </tr>
            <tr>
                <td>Feedback ID: </td>
                <td>{{$mail_data['feedback_id']}}</td>
            </tr>
            <tr>
                <td>Feedback: </td>
                <td>{{$mail_data['feedback_content']}}</td>
            </tr>
            <tr>
                <td>Feedback Images:</td>
                <td><img width="800" height="800" src="{{"/storage/feedback_images/".$mail_data['image_path']}}" alt="{{$mail_data['image_path']}} feedback image"></td>
            </tr>
            <tr>
                <td>Date Created: </td>
                <td>{{$mail_data['created_at']}}</td>
            </tr>
            <tr>
                <td>Date Updated: </td>
                <td>{{$mail_data['updated_at']}}</td>
            </tr>
        </table>

        <h2>User's Details</h2>
        <table>
            <tr>
                <th>Category</th>
                <th>Details</th>
            </tr>
            <tr>
                <td>User ID: </td>
                <td>{{$mail_data['user_id']}}</td>
            </tr>
            <tr>
                <td>Username: </td>
                <td>{{$mail_data['user_name']}}</td>
            </tr>
            <tr>
                <td>User Email: </td>
                <td>{{$mail_data['user_email']}}</td>
            </tr>
        </table>

        <h2>Program Details</h2>
        <table>
            <tr>
                <th>Category</th>
                <th>Details</th>
            </tr>
            <tr>
                <td>Program id: </td>
                <td>{{$mail_data['program_id']}}</td>
            </tr>
            <tr>
                <td>Program code: </td>
                <td>{{$mail_data['program_code']}}</td>
            </tr>
            <tr>
                <td>Program Name: </td>
                <td>{{$mail_data['program_name']}}</td>
            </tr>
            <tr>
                <td>Time period: </td>
                <td>{{$mail_data['start_date']}} - {{$mail_data['end_date']}}</td>
            </tr>
            <tr>
                <td>Company Name: </td>
                <td>{{$mail_data['company_name']}}</td>
            </tr>
            <tr>
                <td>Venue: </td>
                <td>{{$mail_data['venue']}}</td>
            </tr>
            <tr>
                <td>Option: </td>
                <td>{{$mail_data['option']}}</td>
            </tr>
            <tr>
                <td>Number of Employees: </td>
                <td>{{$mail_data['no_of_employees']}}</td>
            </tr>
            <tr>
                <td>Datetime Registered: </td>
                <td>{{$mail_data['datetime_join']}}</td>
            </tr>
            <tr>
                <td>Client Note: </td>
                <td>{{$mail_data['client_notes']}}</td>
            </tr>
        </table>
    </article>
    <footer>
        EMTP Team
    </footer>
</body>
