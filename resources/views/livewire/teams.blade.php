@vite('resources/css/app.css')

<div class="">
    CRUD Equipos

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Equipo</th>
                <th>Madrina</th>
                <th>Matrícula</th>
                <th>Estado</th>
                <th>Descripción</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->id }}</td>
                    <td>{{ $team->team }}</td>
                    <td>{{ $team->goodmother }}</td>
                    <td>{{ $team->enrollment }}</td>
                    <td>{{ $team->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                    <td>{{ $team->description }}</td>
                    <td>{{ $team->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
