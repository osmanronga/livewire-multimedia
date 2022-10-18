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

            @forelse ($videos as $video)
                <tr>
                    <td>{{ $video->id }}</td>
                    <td>{{ $video->title }}</td>
                    <td>
                        <a class="btn btn-sm btn-info"
                            href="{{ route('video.show', $video->id) }}">show</a>
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
