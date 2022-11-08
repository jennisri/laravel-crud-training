@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category</div>

                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                    data-bs-target="#createModal">Create</button>

                    <!-- notif succes -->
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- notif error -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($category_articles as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td class="text-center" width="20%">

                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{ $category->id}}">Update</button>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id}}">
                                      Delete
                                  </button>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- Modal Create-->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Category Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ url('category_article') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection