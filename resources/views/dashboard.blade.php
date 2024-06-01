@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
  
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row justify-content-center"> 

            <div class="col-6">
              <!-- small box -->
              <div class="small-box bg-info p-4">
                <div class="inner">
                  <h3>Dashboard</h3>
                  <p>Satya Arya</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </div>

          </div>

          <div class="row justify-content-center"> <!-- Membuat row baru untuk box kedua -->
            <div class="col-6">
              <!-- small box -->
              <div class="small-box bg-warning p-4">
                <div class="inner">
                  <h3>Jumlah Transaksi</h3>
                  <h3>{{$transactionsCount}}</h3>
                  
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>

                </div>
                <a href="{{route('transactions.index')}}" class="small-box-footer">Details<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>

        </div>
    </section>
@endsection
