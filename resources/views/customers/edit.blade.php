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
                   <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                       @csrf
                       @method('PUT')
                       <div class="card-body">
                           <div class="form-group">
                               <label for="name">Nama Barang</label>
                               <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $customer->name }}">
                           </div>

                       </div>

                       <div class="card-body">
                           <div class="form-group">
                               <label for="email">Email</label>
                               <input type="email" class="form-control" id="email" name="email"
                                   value="{{ $customer->email }}">
                           </div>
                       </div>

                       <div class="card-body">
                           <div class="form-group">
                               <label for="address">phone</label>
                               <input type="text" class="form-control" id="phone" name="phone"
                                   value="{{ $customer->phone }}">
                           </div>
                       </div>


                       <div class="card-body">
                        <div class="form-group">
                            <label for="address">alamat</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $customer->address }}">
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
