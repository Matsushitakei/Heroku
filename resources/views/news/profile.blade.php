@extends('layouts.front')

@section('content')

<body>
  <center>
<table border="1" width="400" height="400">

  <tr align="center">
    <th colspan="2">My プロフィール</th>
  </tr>
  <tr align="center">
    <td>氏名</td>
    <td>{{$profiles[0]->name}}</td>
  </tr>
  <tr align="center">
    <td>性別</td>
    <td>{{$profiles[0]->gender}}</td>
  </tr>
  <tr align="center">
    <td>趣味</td>
    <td>{{$profiles[0]->hobby}}</td>
  </tr>
  <tr align="center">
  <td>自己紹介欄</td>
  <td>{{$profiles[0]->introduction}}</td>
  </tr>
</table>
</center>
</body>
@endsection
