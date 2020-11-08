<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h4>Hello Doctor , {{$details['title']}} </h4>
    <hr>
    <table>
        <th>PF Number</th>
        <th>Name</th>
        <th>Age</th>
        <th>OPD</th>
        <th>Booked for</th>
        @foreach ($details['body'] as $item)
        <tr class="table-success">
            <td>{{$item->pf_ppo}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->age}}</td>
            <td>{{$item->opd}}</td>
            <td>{{$item->appoint_for}}</td>
        </tr>
        @endforeach


    </table>
        <br>
        <br>
    Regards,<br>
    <b>IT CELL - MMCT Division</b>

</body>

</html>
