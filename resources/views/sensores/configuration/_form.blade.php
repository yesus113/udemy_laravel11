@csrf

<label for="" class="form-control-label">Equipo</label>
<input class="form-control" type="text" name="con_equipo" value="{{ old('con_equipo', $config->con_equipo) }}">

<label for="" class="form-control-label">Latitud</label>
<input class="form-control" type="text" name="con_latitud" value="{{ old('con_latitud', $config->con_latitud) }}">

<label for="" class="form-control-label">Longitud</label>
<input class="form-control" type="text" name="con_longitud" value="{{ old('con_longitud', $config->con_longitud) }}">

<label for="" class="form-control-label">Nombre de Usuario</label>
<input class="form-control" type="text" name="con_user" value="{{ old('con_user', $config->con_user) }}">

<label for="" class="form-control-label"> Contraseña</label>
<input class="form-control" type="text" name="con_password" value="{{ old('con_password', $config->con_password) }}">

<button class="btn btn-success my-3" type="submit">Send</button>
