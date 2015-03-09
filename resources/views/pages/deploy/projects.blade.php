<table class="table table-bordered">
    @foreach($projects as $project)
        <tr>
            <td>
                {{ $project->name }}
            </td>
        </tr>
    @endforeach
</table>