<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>MEGA deploy</title>
</head>
<body>
<div class="container">
    <h2>Deployed</h2>
    <table class="table table-hover">
        <tbody>
        @foreach($dirs as $dir)
            <tr>
                <th style="width: 350px">{{ basename($dir) }}</th>
                <td>
                    @if(basename($dir) != 'master')
                        <a href="/delete/{{$dir}}" class="call" onclick="return confirm('Confirm action')">Delete</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Deploy</h2>
    <table class="table table-hover">
        <tbody>
        @foreach($branches as $branch)
            <tr>
                <th style="width: 350px">{{ basename($branch) }}</th>
                <td><a href="/deploy/{{basename($branch)}}" onclick="return confirm('Confirm action')">Deploy</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

