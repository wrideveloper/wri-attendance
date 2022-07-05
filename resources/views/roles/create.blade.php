<h2>Form Input</h2>
<form action="{{ url("roles") }}" method="post">
  @csrf
  Nama Role <input type="text" name="roles_name">
  <br>
  <br>
  <button type="submit">Simpan</button>

</form>