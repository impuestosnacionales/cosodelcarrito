@extends('layouts.app')

@section('content')
<header class="header">
    <div class="search-bar">
        <input type="text" placeholder="Buscar restaurantes, comidas o más">
        <button>Buscar</button>
    </div>
</header>
<main>
    <section class="products-by-category">
        <h2>Productos en la categoría: {{ $categoria->nombre }}</h2>
        <div class="product-list">
        @foreach ($productos as $item)
          <div class="col-3">
            <div class="card">
                <img src="/img/{{$item->image}}" class="card-img-top">
                <div class="card-body text-center">
                    <h2>{{$item->nombre}}</h2>
                    
                    <p> USD {{$item->precio}}</p>
                </div>
                <div class="card-footer">
                    <form action="{{route('add')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="submit" name="btn" class="btn btn-success w-100" value="addToCart">
                    </form>

                </div>
            </div>
          </div>
          @endforeach   
        </div>
    </section>
</main>
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
