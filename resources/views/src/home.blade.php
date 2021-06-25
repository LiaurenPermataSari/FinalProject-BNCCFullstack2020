@extends('layout.index')

@section('content')
    <div class="row py-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="/home" method="POST">
                        @csrf 
                    
                        <div class="form-group">
                            <label for="isi">Write New Post!</label>
                            <input type="text" class="form-control" placeholder="What do you think?" name="question" id="question">
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <b>Liauren Permata Sari</b>
                </div>
                <div class="card-body">
                    Seorang Mahasiswa Bina Nusantara University B2024
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 p-2">
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
    </div>


    @foreach($question as $q)
    <div class="col-md-8 p-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>
                                <a class="text-body" href="/post/{{$q->id}}">
                                    {{$q->question}}
                                </a>
                            </h5>
                        </div>
                        
                        <form action="/post/{{$q->id}}">
                            <button class="btn btn-primary">Show!</button>
                        
                        </form>
                    </div>
                    <small class="text-muted" >{{$q->created_at}}</small>
                </div>
            </div>    
    </div>
    @endforeach
@endsection