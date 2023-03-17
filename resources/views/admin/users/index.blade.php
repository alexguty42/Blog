<x-app-layout>

</x-app-layout>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="tabla">
    <h1>Llista de Usuaris</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td> <form action="{{ url('/users/'.$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm  hover:text-red-700">Eliminar</button>
                    </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
