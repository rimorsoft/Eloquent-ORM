<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $user->name }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
            	<div class="col-12 my-3 pt-3 shadow">
                    <img src="{{ $user->image->url }}" class="float-left rounded-circle mr-2">
            		<h1>{{ $user->name }}</h1>
            		<h3>{{ $user->email }}</h3>
            		<p>
            			<strong>Instagram</strong>: {{ $user->profile->instagram }} <br>
            			<strong>GitHub</strong>: {{ $user->profile->github }} <br>
            			<strong>Web</strong>: {{ $user->profile->web }}
            		</p>
                    <p>
                        <strong>País</strong>: {{ $user->location->country }} <br>
                        <strong>Nivel</strong>: @if ($user->level) 
                            <a href="{{ route('level', $user->level->id) }}">
                                {{ $user->level->name }}
                            </a>
                        @else
                            ---
                        @endif <br>
                    </p>
                    <hr>
                    <p>
                        <strong>Grupos</strong>:
                        @forelse($user->groups as $group)
                            <span class="badge badge-primary">{{ $group->name }}</span>
                        @empty
                            <em>No pertenece a algún grupo</em>
                        @endforelse
                    </p>

                    <hr>
                    
                    <h3>Posts</h3>

                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ $post->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->name }}</h5>
                                            <h6 class="card-subtitle text-muted">
                                                {{ $post->category->name }} |
                                                {{ $post->comments_count }}
                                                {{ Str::plural('comentario', $post->comments_count) }}
                                            </h6>
                                            <p class="card-text small">
                                                @foreach($post->tags as $tag)
                                                <span class="badge badge-light">
                                                    #{{ $tag->name }}
                                                </span>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <h3>Videos</h3>

                    <div class="row">
                        @foreach($videos as $video)
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ $video->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $video->name }}</h5>
                                            <h6 class="card-subtitle text-muted">
                                                {{ $video->category->name }} |
                                                {{ $video->comments_count }}
                                                {{ Str::plural('comentario', $video->comments_count) }}
                                            </h6>
                                            <p class="card-text small">
                                                @foreach($video->tags as $tag)
                                                <span class="badge badge-light">
                                                    #{{ $tag->name }}
                                                </span>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
            	</div>
            </div>
        </div>
    </body>
</html>
