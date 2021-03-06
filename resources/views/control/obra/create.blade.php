@extends('layouts.app')
@section('content')
<div class="col-md-8 mx-auto">
    <v-card>
        <v-card-title>Crear Obra</v-card-title>
        <v-card-text>
            <form class="px-3" method="POST" action="{{ route('obras.store') }}">
                @csrf

                <h4 class="border-bottom text-center">Cliente y Trato:</h4>

                <div class="form-group row">
                    <label for="cliente_id">Cliente:</label>
                    <select class="form-control" name="cliente_id" @error('cliente_id') is-invalid @enderror>
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->razon_social }}</option>
                        @endforeach
                    </select>
                    @error('cliente_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="trato_tipo">Tipo de Trato:</label>
                    <select class="form-control" name="trato_tipo" @error('trato_tipo') is-invalid @enderror>
                        <option value="licitacion">Licitacion</option>
                        <option value="contrato">Contrato</option>
                        <option value="orden_compra">Orden de Compra</option>
                        <option value="otro">Otro</option>
                    </select>
                    @error('trato_tipo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="trato_ref">id o codigo de referencia del trato:</label>
                    <input class="form-control" name="trato_ref" type="text" @error('trato_ref') is-invalid @enderror />
                    @error('trato_ref')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="trato_nombre">Nombre del trato o documento:</label>
                    <input class="form-control" name="trato_nombre" type="text" @error('trato_nombre') is-invalid @enderror />
                    @error('trato_nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <h4 class="border-bottom text-center">Datos de la Obra:</h4>

                <div class="form-group row">
                    <label for="nombre">Nombre:</label>
                    <input class="form-control" name="nombre" type="text" @error('nombre') is-invalid @enderror />
                    @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="estado_obra_id">Estado de la Obra:</label>
                    <select class="form-control" name="estado_obra_id">
                        @foreach($estados as $estado)
                            <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                        @endforeach
                    </select>
                    @error('estado_obra_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="fecha_inicio">Fecha Inicio:</label>
                    <input class="form-control" name="fecha_inicio" type="date" @error('fecha_inicio') is-invalid @enderror />
                    @error('fecha_inicio')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group row">
                    <label for="fecha_termino">Fecha Termino:</label>
                    <input class="form-control" name="fecha_termino" type="date" @error('fecha_termino') is-invalid @enderror />
                    @error('fecha_termino')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="plazo">Plazo:</label>
                    <input class="form-control" name="plazo" type="text" @error('plazo') is-invalid @enderror />
                    @error('plazo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="descripcion">Descripcion:</label>
                    <textarea cols="30" name="descripcion" class="form-control" rows="10" @error('descripcion') is-invalid @enderror></textarea>
                    @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <h4 class="border-bottom text-center">Condiciones de la Obra:</h4>

                <h6 class="text-center">Contacto:</h6>

                <div class="form-group row">
                    <label for="contacto_nombre">Nombre:</label>
                    <input class="form-control" name="contacto_nombre" type="text" @error('contacto_nombre') is-invalid @enderror />
                    @error('contacto_nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="contacto_telefono">Telefono:</label>
                    <input class="form-control" name="contacto_telefono" type="text" @error('contacto_telefono') is-invalid @enderror />
                    @error('contacto_telefono')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="contacto_correo">Correo:</label>
                    <input class="form-control" name="contacto_correo" type="email" @error('contacto_correo') is-invalid @enderror />
                    @error('contacto_correo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <h6 class="text-center">Responsable:</h6>

                <div class="form-group row">
                    <label for="responsable_nombre">Nombre:</label>
                    <input class="form-control" name="responsable_nombre" type="text" @error('responsable_nombre') is-invalid @enderror />
                    @error('responsable_nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="responsable_telefono">Telefono:</label>
                    <input class="form-control" name="responsable_telefono" type="text" @error('responsable_telefono') is-invalid @enderror />
                    @error('responsable_telefono')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="responsable_correo">Correo:</label>
                    <input class="form-control" name="responsable_correo" type="email" @error('responsable_correo') is-invalid @enderror />
                    @error('responsable_correo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <h6 class="text-center">Supervisor:</h6>

                <div class="form-group row">
                    <label for="supervisor_nombre">Nombre:</label>
                    <input class="form-control" name="supervisor_nombre" type="text" @error('supervisor_nombre') is-invalid @enderror />
                    @error('supervisor_nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="supervisor_telefono">Telefono:</label>
                    <input class="form-control" name="supervisor_telefono" type="text" @error('supervisor_telefono') is-invalid @enderror />
                    @error('supervisor_telefono')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="supervisor_correo">Correo:</label>
                    <input class="form-control" name="supervisor_correo" type="email" @error('supervisor_correo') is-invalid @enderror />
                    @error('supervisor_correo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <h6 class="text-center">Localidad:</h6>

                <div class="form-group row">
                    <label for="comuna">Comuna:</label>
                    <input class="form-control" name="comuna" type="text" @error('comuna') is-invalid @enderror />
                    @error('comuna')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="ciudad">Ciudad:</label>
                    <input class="form-control" name="ciudad" type="text" @error('ciudad') is-invalid @enderror />
                    @error('ciudad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="ubicacion">Ubicacion:</label>
                    <input class="form-control" name="ubicacion" type="text" @error('ubicacion') is-invalid @enderror />
                    @error('ubicacion')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="latitud">Latitud:</label>
                    <input class="form-control" name="latitud" type="text" @error('latitud') is-invalid @enderror />
                    @error('latitud')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="longitud">Longitud:</label>
                    <input class="form-control" name="longitud" type="text" @error('longitud') is-invalid @enderror />
                    @error('longitud')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" name="continue" value="0" class="btn btn-success">Guardar y salir</button>
                <button type="submit" name="continue" value="1" class="btn btn-success">Guardar y continuar</button>

            </form>
        </v-card-text>
    </v-card>
</div>@endsection
