<div>
  <table border="1">
    <thead>
      <tr>
        <th>#</th>
        <th>{{__('home.user')}}</th>
        <th>{{__('home.todoTitle')}}</th>
        <th>{{__('home.status')}}</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($details as $item)
    <tr>
      <td>{{$item['id']}}</td>
      <td>{{$item['userId']}}</td>
      <td>{{$item['title']}}</td>
      @if ($item['completed'])
      <td style="color: white; background-color: green">{{__('home.completed')}}</td>
      @else
      <td style="color: white; background-color: red">{{__('home.not_completed')}}</td>
      @endif
    </tr>
    @endforeach
    </tbody>
  </table>  
</div>
