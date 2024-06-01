   @extends('layouts.main')

   @section('title', '{{ $title }}')

   @section('content')



       <!-- Main content -->
       <section class="content">
           <div class="container-fluid">



               <!-- general form elements -->
               <div class="card card-primary">
                <div class="card-header">
                  <h1 class="card-title">{{$title}}</h1>
               
               
              </div>
                   <!-- /.card-header -->
                   <!-- form start -->
                   <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                       <div class="card-body">
                           <div class="form-group">
                               <label for="name">Kategori Barang</label>
                               <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                           </div>

                       </div>

                           <div class="card-body">
                               <div class="form-group">
                                   <label for="description">Deskripsi</label>
                                   <input type="text" class="form-control" id="description" name="description" value="{{ old('name') }}">
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
