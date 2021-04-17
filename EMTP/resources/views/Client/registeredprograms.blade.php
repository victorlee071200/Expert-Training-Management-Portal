<x-app-layout title="Dashboard - Backend">
    <h1>Registered Program List</h1>

    <table class="table table-striped">
        <tbody>
        @foreach($registeredprograms as $indexKey => $program)
        <tr>
            <td><a class="hover:bg-blue-700" href="registeredprograms/{{$program->id}}/{{$programdetails[$indexKey]->id}}">{{$programdetails[$indexKey]->name}}</a> </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>