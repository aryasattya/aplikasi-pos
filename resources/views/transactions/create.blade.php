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
                   <form action="{{ route('transactions.store') }}" method="POST">
                       @csrf

                       @if ($errors->any())
                       <div class="alert alert-danger">
                           <strong>Whoops!</strong> There were some problems with your input.<br><br>
                           <ul>
                               @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                       @endif
                       <div class="card-body">
                        <div class="form-group">
                            <label for="customer_id">Kostumer</label>
                            <select name="customer_id" id="customer_id" class="form-control">
                                @foreach ($customers as $item)
                                    <option value="{{ $item->id }}" class="form-control">{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="product_id">Produk</label>
                            <select name="product_id" id="product_id" class="form-control">
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}" class="form-control">{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="user_id">Users</label>
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}" class="form-control">{{ $item->username }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                       <div class="card-body">
                           <div class="form-group">
                               <label for="quantity">Jumlah Produk</label>
                               <input type="text" class="form-control" id="quantity" name="quantity"
                                   value="{{ old('quantity') }}">
                           </div>
                       </div>

                  

                    <div class="card-body">
                        <div class="form-group">
                            <label for="date">Tanggal transaksi</label>
                            <input type="date" class="form-control" id="date" name="date"
                                value="{{ old('date') }}">
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
