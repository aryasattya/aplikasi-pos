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
                   <form action="{{ route('customers.store') }}" method="POST">
                       @csrf
                       <div class="card-body">
                           <div class="form-group">
                               <label for="name">Nama Kostumer</label>
                               <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name') }}">
                           </div>

                       </div>

                       <div class="card-body">
                           <div class="form-group">
                               <label for="price">Email</label>
                               <input type="email" class="form-control" id="email" name="email"
                                   value="{{ old('email') }}">
                           </div>
                       </div>

                       <div class="card-body">
                           <div class="form-group">
                               <label for="phone">NO.Hp</label>
                               <input type="text" class="form-control" id="phone" name="phone"
                                   value="{{ old('phone') }}">
                           </div>
                       </div>
                       <div class="card-body">
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ old('address') }}">
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
