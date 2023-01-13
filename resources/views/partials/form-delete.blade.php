<form action="{{route('comics.destroy', $id)}}" method="POST" class="d-inline"
onsubmit="return confirm('Confermi l\'eliminazione di {{$title}}')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" title="trash"><i class="fa-regular fa-trash-can"></i></button>

</form>
