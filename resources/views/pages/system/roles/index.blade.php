<table class="table table-bordered">
    <thead>
    <tr>
        <th>Nome</th>
        <th width="1%">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Root</td>
        <td nowrap>
            <a href="{{ URL::route('system.roles.edit', 1) }}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
            <a href="{{ URL::route('system.roles.destroy', 1) }}" class="btn btn-danger btn-xs delete-record"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
    </tbody>
</table>