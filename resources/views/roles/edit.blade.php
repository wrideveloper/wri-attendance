<h2>Form Input</h2>
<form action="{{ url("roles/".$model->id) }}" method="post">
  @csrf
  <input type="hidden" name="_method" value="PATCH">
  Nama Role <input type="text" name="roles_name" value="{{ $model->roles_name }}">
  <br>
  <br>
  <button type="submit">Simpan</button>

</form>