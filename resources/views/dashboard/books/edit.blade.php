@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Book</h1>

</div>
<div class="col-lg-7">
    <form method="post" action="/dashboard/books/{{ $book->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        {{-- Tittle --}}
        <div class="mb-3">
          <label for="tittle" class="form-label">Tittle</label>
          <input type="text" class="form-control @error('tittle') is-invalid @enderror" id="tittle" name="tittle" value="{{ old('tittle',$book->tittle)  }}" required autofocus>
          @error('tittle')
          <div id="validationServer03Feedback" class="invalid-feedback text-start">
            {{ $message }}
          </div>
         @enderror
        </div>

        {{-- Slug --}}
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug',$book->slug) }}" required>
            @error('slug')
            <div id="validationServer03Feedback" class="invalid-feedback text-start">
              {{ $message }}
            </div>
           @enderror
         </div>
        

         {{-- Category --}}
         <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    @if (old('category_id',$book->category_id)  == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>       
                    @else 
                        <option value="{{ $category->id }}">{{ $category->name }}</option> 
                    @endif
                @endforeach
            </select>
         </div>

         {{-- Image --}}
         <div class="mb-3">
            <label for="image" class="form-label ">Upload Image(Opsional)</label>
            <input type="hidden" name="oldImage" value="{{ $book->image }}">

            @if($book->image)
             <img src="{{ asset('storage/' .$book->image)}}"class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
             <img class="img-preview img-fluid mb-3 col-sm-5">

            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div id="validationServer03Feedback" class="invalid-feedback text-start">
              {{ $message }}
            </div>
           @enderror
          </div>


          {{--Trix Editor--}}
          <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{ $book->body }}" required >
            <trix-editor input="body"></trix-editor>
            @error('body')
                <p style="color: red">{{ $message }}</p>
            @enderror
         </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
      </form>
</div>

<script>
    const tittle = document.querySelector('#tittle');
    const slug = document.querySelector('#slug');

    tittle.addEventListener('change',function(){
         fetch('/dashboard/books/createSlug?tittle=' + tittle.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept',function(e){
        e.preventDefault();
    })

     // Image Preview
     function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      // Mengambil data gambar
      const oFREADER = new FileReader();
      oFREADER.readAsDataURL(image.files[0]);

      oFREADER.onload = function(oFREvent)  {
        imgPreview.src = oFREvent.target.result;
      }
    }

</script>

@endsection