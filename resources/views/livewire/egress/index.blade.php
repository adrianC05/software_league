@vite('resources/css/app.css')

@extends('adminlte::page')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Title -->
        <h2 class="text-3xl font-semibold leading-tight text-center p-2">Egresos</h2>
        <button wire:click="create" class="bg-blue-500 text-white px-4 py-2 mb-2 rounded-lg overflow-hidden">Nuevo
            Equipo</button>

        <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse rounded-lg overflow-hidden">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3">Descripción</th>
                    <th scope="col" class="px-6 py-3">Valor</th>
                    <th scope="col" class="px-6 py-3">Fecha</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($egresses as $egress)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-3">{{ $egress->description }}</td>
                        <!-- <td class="px-6 py-4">{{ $egress->goodmother }}</td> -->
                        <td class="px-6 py-3">{{ number_format($egress->enrollment, 2) }}</td>
                        <td class="px-6 py-3">
                            <button wire:click="edit({{ $egress->id }})"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg">Editar</button>
                            <button wire:click="destroy({{ $egress->id }})"
                                class="bg-red-500 text-white px-4 py-2 rounded-lg">Eliminar</button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $egresses->links() }}
        </div>

    </div>

@stop
