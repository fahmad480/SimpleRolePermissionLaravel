<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Permission | {{ getenv('APP_NAME') }}</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .permission-page {
            width: 720px;
            padding: 8% 0 0;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 720px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }

        .form button:hover,
        .form button:active,
        .form button:focus {
            background: #43A047;
        }

        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }

        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }

        .form .register-form {
            display: none;
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }

        .container:before,
        .container:after {
            content: "";
            display: block;
            clear: both;
        }

        .container .info {
            margin: 50px auto;
            text-align: center;
        }

        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }

        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }

        .container .info span a {
            color: #000000;
            text-decoration: none;
        }

        .container .info span .fa {
            color: #EF3B3A;
        }

        body {
            background: #76b852;
            /* fallback for old browsers */
            background: rgb(141, 194, 111);
            background: linear-gradient(90deg, rgba(141, 194, 111, 1) 0%, rgba(118, 184, 82, 1) 50%);
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        select {
            width: 100%;
            padding: 16px 20px;
            border: none;
            border-radius: 4px;
            background-color: #f1f1f1;
        }

        input[type=checkbox] {
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body>
    <div class="permission-page">
        <div class="form">
            @if(session()->has('error'))
            <div style="color: red; margin-bottom: 10px;">{{ session()->get('error') }}</div>
            @endif
            @if(session()->has('success'))
            <div style="color: green; margin-bottom: 10px;">{{ session()->get('success') }}</div>
            @endif
            <form action="{{ route('api.post_permission') }}" method="post">
                @csrf
                <h1 style="margin-top: 0;">Control User Permission</h1>
                <select name="role" id="role">
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <table style="margin-top: 20px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Check</th>
                            <th>Component</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($components as $component)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <input type="checkbox" name="permission[{{ $component->id }}]"
                                    id="permission{{ $component->id }}" {{ $myComponents->contains('id', $component->id)
                                ? 'checked' : '' }}>
                            </td>
                            <td>{{ $component->name }}</td>
                            <td>{{ $component->description }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" style="margin-top: 20px; max-width: 150px;">Change</button>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        let role_id = null;
        $('#role').change(function() {
            role_id = $(this).val();
            let url = "{{ route('api.permission_by_role', ['role' => ':role_id']) }}";
            url = url.replace(':role_id', role_id);

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function(data) {
                    $.each(data, function(index, value) {
                        $("#permission" + value.id).prop('checked', (value.permission == 1) ? true : false);
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    </script>
</body>

</html>