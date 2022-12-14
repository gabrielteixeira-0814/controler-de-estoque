<table class='table'>
    <tr>
        <th scope="col">
            Nome
        </th>
        <th scope="col">
            Cargo
        </th>
        <th scope="col">
            Ações
        </th>
    </tr>

    @foreach ($listUser as $user)
        <tr>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->office }}
            </td>
            <td>
                <button class='edit userButton' id='editUser' value="{{ $user->id }}" name="{{ $user->id }}" data-toggle="modal" data-target="#user" style="color: #0099B2; font-size: 16px;"><i class='bx bxs-edit-alt'></i></button>
                <button class='delete userButton' id='deleteUser' value="{{ $user->id }}" name="{{ $user->id }}" style="color: #e93535; font-size: 16px;" ><i class='bx bxs-trash'></i></button>
            </td>
        </tr>
    @endforeach
    </tr>
</table>
