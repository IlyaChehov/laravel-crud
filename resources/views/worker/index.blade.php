@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Workers list</h1>

    @empty($workers)
        <h2>Not workers...</h2>
    @endempty

   @if(!empty($workers))
       <table class="table mb-5">
           <thead>
           <tr>
               <th scope="col">№</th>
               <th scope="col">Name</th>
               <th scope="col">Surname</th>
               <th scope="col">Age</th>
               <th scope="col">Email</th>
               <th scope="col">Description</th>
               <th scope="col">Is married</th>
               <th scope="col">Creation date</th>
           </tr>
           </thead>
           <tbody>
           @foreach($workers as $worker)
               <tr>
                   <td>{{ $loop->iteration }}</td>
                   <td>{{ $worker->name }}</td>
                   <td>{{ $worker->surname }}</td>
                   <td>{{ $worker->age }}</td>
                   <td>{{ $worker->email }}</td>
                   <td>{{ $worker->description }}</td>
                   <td>{{ $worker->is_married ? 'Yes' : 'No' }}</td>
                   <td>{{ $worker->created_at }}</td>
                   <td><a href="{{ route('worker.show', $worker) }}" class="btn btn-info">Show</a></td>
               </tr>
           @endforeach
           </tbody>
       </table>

       <div class="pagination">
           {{ $workers->links() }}
       </div>

   @endif
@endsection
