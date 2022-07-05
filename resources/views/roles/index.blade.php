
<a href="{{ url("roles/create") }}"><button>Tambah</button></a>
<br>
<br>
<table>
  <tr>
    <th>ID</th>
    <th>Roles</th>
    <th colspan="2">Aksi</th>
  </tr>
  @foreach ($datas as $key=>$value)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $value -> roles_name }}</td>
        <td><form action="{{ url("roles/".$value->id."/edit") }}">
          <a href=""><button>Edit</button></a>
        </form></td>
        <td>
          <form action="{{ url("roles/".$value->id) }}" method="post">

            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit">Delete</button>
          </form>
        </td>
      </tr>
  @endforeach
</table>