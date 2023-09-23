<x-bootstrap title="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Movie {{ $movie->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/movie') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/movie/' . $movie->id . '/edit') }}" title="Edit Movie"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('movie' . '/' . $movie->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Movie" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $movie->id }}</td>
                                    </tr>
                                    <tr><th> Category Id </th><td> {{ $movie->category_id }} </td></tr><tr><th> Title </th><td> {{ $movie->title }} </td></tr><tr><th> Actor </th><td> {{ $movie->actor }} </td></tr><tr><th> Price </th><td> {{ $movie->price }} </td></tr><tr><th> Special </th><td> {{ $movie->special }} </td></tr><tr><th> Common Id </th><td> {{ $movie->common_id }} </td></tr><tr><th> Sold </th><td> {{ $movie->sold }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap>