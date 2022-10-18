<div>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>show</td>
            </tr>
        </thead>

        <tbody>

            @forelse ($voices as $voice)
                <tr>
                    <td>{{ $voice->id }}</td>
                    <td>{{ $voice->title }}</td>
                    <td>
                        <a class="btn btn-sm btn-info"
                            href="{{ route('voice.show', $voice->id) }}">show</a>
                    </td>
                </tr>   
            @empty
                <tr>
                    <td colspan="3">Not Found Record</td>
                </tr>    
            @endforelse
            
        </tbody>
    </table>
</div>
