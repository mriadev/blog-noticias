<x-app-layout>
    <div class="container mt-5">
        {{-- Filtrar por género --}}
        <div class="row">

            <div class="col-12">
                <form action="{{ route('posts.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <select class="form-select" id ="genre" name="genre">
                            <option value="">Género</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" {{ request('genre') == $genre->id ? 'selected' : '' }}>
                                    {{ $genre->name }}
                                </option>
                            @endforeach
                        </select>
                        {{-- genre_id en invisible --}}
                        
                        <button class="btn btn-dark" type="submit">Filtrar</button>
                    </div>
            
                </form>
            </div>
        </div>


        <div class="row">
            @foreach ($posts as $post)
                <x-post-layout :post="$post" :likes="$post->likes_count" />
            @endforeach
        </div>
    </div>
    
    {{-- Paginación --}}
    <x-pagination-layout :posts="$posts" />
    

</x-app-layout>