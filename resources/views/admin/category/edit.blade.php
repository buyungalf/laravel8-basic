<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Edit Category                            
                        </div>
                        <div class="card-body">
                            <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                  <label for="category_name">Update Category Name</label>
                                  <input type="text" value="{{ $categories->category_name }}" class="form-control" name="category_name" aria-describedby="emailHelp">
                                  @error('category_name')
                                      <span class="text-danger"> {{ $message }}</span>
                                  @enderror
                                </div>                            
                                <button type="submit" class="btn btn-primary">Update</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
