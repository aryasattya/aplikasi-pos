   @extends('layouts.main')

   @section('title', '{{ $title }}')

   @section('content')



       <!-- Main content -->
       <section class="content">
           <div class="container-fluid">



               <!-- general form elements -->
               <div class="card card-primary">
                   <div class="card-header">
                       <h1 class="card-title">{{ $title }}</h1>


                   </div>
                   <!-- /.card-header -->
                   <!-- form start -->
                   <form action="{{ route('products.update', $product->id) }}" method="POST">
                       @csrf
                       @method('PUT')
                       <div class="card-body">
                           <div class="form-group">
                               <label for="name">Nama Barang</label>
                               <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $product->name }}">
                           </div>

                       </div>

                       <div class="card-body">
                           <div class="form-group">
                               <label for="price">Harga</label>
                               <input type="text" class="form-control" id="price" name="price"
                                   value="{{ $product->price }}">
                           </div>
                       </div>

                       <div class="card-body">
                           <div class="form-group">
                               <label for="quantity">Stok</label>
                               <input type="text" class="form-control" id="quantity" name="quantity"
                                   value="{{ $product->quantity }}">
                           </div>
                       </div>

                       <div class="card-body">
                           <div class="form-group">
                               <label for="category_id">Category</label>
                               <select name="category_id" id="category_id" class="form-control">
                                   @foreach ($categories as $item)
                                   <option value="{{ $item->id }}"
                                    {{ old('category_id', $product->category_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
               </div>
               <!-- /.card-body -->

               <div class="card-footer">
                   <button type="submit" class="btn btn-primary">Submit</button>
               </div>
               </form>
           </div>

           </div>
       </section>
   @endsection
