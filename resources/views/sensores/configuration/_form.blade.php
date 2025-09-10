@csrf

<label for="" class="form-control-label">Equipo</label>
<input class="form-control" type="text" name="con_equipo" value="{{ old('con_equipo', $config->con_equipo) }}">

<label for="" class="form-control-label">Latitud</label>
<input class="form-control" type="text" name="con_latitud" value="{{ old('con_latitud', $config->con_latitud) }}">

<label for="" class="form-control-label">Longitud</label>
<input class="form-control" type="text" name="con_longitud" value="{{ old('con_longitud', $config->con_longitud) }}">

<label for="" class="form-control-label">Usuario</label>
<select class="form-control" name="user_id">

    @foreach ($user as $name => $id)
        <option {{ old('user_id', $config->user_id) == $id ? 'selected' : '' }} value="{{ $id }}">
            {{ $name }}</option>
    @endforeach
</select>

<button class="btn btn-success my-3" type="submit">Send</button>
