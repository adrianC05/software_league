@vite('resources/css/app.css')

@extends('adminlte::page')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Title -->
        <h2 class="text-3xl font-semibold leading-tight text-center p-2">Equipos</h2>

        <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse rounded-lg overflow-hidden">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Equipo</th>
                    <!-- <th scope="col" class="px-6 py-3">Madrina</th> -->
                    <th scope="col" class="px-6 py-3">Matrícula</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $team->id }}</td>
                        <td class="px-6 py-4">{{ $team->team }}</td>
                        <!-- <td class="px-6 py-4">{{ $team->goodmother }}</td> -->
                        <td class="px-6 py-4">{{ $team->enrollment }}</td>
                        <td class="px-6 py-4">{{ $team->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                        <td class="px-6 py-4">{{ $team->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

@stop
