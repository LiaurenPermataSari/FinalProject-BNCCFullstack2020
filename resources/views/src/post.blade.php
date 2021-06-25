@extends('layout.index')

@section('content')
        <div class="p-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$question->question}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$question->created_at}}</h6>

                    <form role="form" action="/post/{{$question->id}}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <input type="hidden" value="{{$question->id}}" name="question_id" id="question_id">
                                <input class="form-control" type="text" placeholder="Tambahkan jawaban..." name="answer" id="answer">
                            </div>
                            
                            <button class="btn btn-primary"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </form>

                    <a href="#" class="card-link">Delete</a>
                    <a href="#" class="card-link">Like</a>
                </div>
            </div>
        </div>

            @if(count($answers) > 0)
                @foreach($answers as $q)
                    @if($q->question_id == $question->id)
                        <div class="col-md-6 p-2">
                            <div class="card">
                                <div class="card-body">
                                    {{$q->answers}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col-md-6 p-2">
                    <div class="card p-2 bg-danger">
                        <div class="card-body">
                            There Is No Posts Here!
                        </div>
                    </div>
                </div>
            @endif
@endsection