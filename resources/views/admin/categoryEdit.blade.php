@include('admin.assets.navbar')


<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="container">

        <div class="container">


            <div class="row layout-top-spacing">

                <div id="basic" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Edit Category</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            @if (Session::has('done'))
                                <div class="alert alert-success text-center" role="alert">
                                    {{ Session::get('done') }}
                                </div>
                            @elseif(Session::has('error'))
                                <div class="alert alert-danger text-center" role="alert">
                                    {{ Session::get('error') }}
                                </div>

                            @elseif ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <div class="row">
                                <div class="col-lg-6 col-12 mx-auto">
                                    <form method="post" action="{{ route('admin.category.update',$category->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="t-text">Text</label>
                                            <input id="t-text" type="text" value="{{$category->name}}" name="name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="t-text">Image</label>
                                            <input id="t-text" type="file" value="{{$category->image}}" name="image" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="t-text">Icon</label>
                                            <input id="t-text" type="text" value="{{$category->icon}}" name="icon" class="form-control" required>
                                        </div>
                                        <button class="btn btn-primary mt-3 mb-2" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


             
            </div>
        </div>


    </div>
</div>
</div>
</div>
<!--  END CONTENT AREA  -->
@include('admin.assets.footer')
