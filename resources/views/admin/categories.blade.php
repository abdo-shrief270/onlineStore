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
                                    <h4>Add Category</h4>
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
                                    <form method="post" action="{{ route('admin.category.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="t-text">Text</label>
                                            <input id="t-text" type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="t-text">Image</label>
                                            <input id="t-text" type="file" name="image" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="t-text">Icon</label>
                                            <input id="t-text" type="text" name="icon" class="form-control" required>
                                        </div>
                                        <button class="btn btn-primary mt-3 mb-2" type="submit">Add</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div id="tableProgress" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Progress Table</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Icon</th>
                                            <th class="text-center">Products Count</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td class="text-center">{{$category->id}}</td>
                                                <td class="text-center">{{$category->name}}</td>
                                                <td class="text-center">{{$category->image}}</td>
                                                <td class="text-center">{{$category->icon}}</td>
                                                <td class="text-center">{{$category->countOfProducts}}</td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li>
                                                            <form method="get"
                                                                action="{{ route('admin.category.edit', $category->id) }}">
                                                                <button class="btn btn-dark" type="submit"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-edit-2">
                                                                        <path
                                                                            d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                        </path>
                                                                    </svg></button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post"
                                                                action="{{ route('admin.category.delete', $category->id) }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-dark" type="submit"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-trash-2">
                                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                                        <path
                                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                        </path>
                                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                    </svg></button>
                                                            </form>
                                                        </li>

                                                    </ul>


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="code-section-container">

                                <button class="btn toggle-code-snippet"><span>Code</span></button>

                                <div class="code-section text-left">
                                    <pre>
&lt;div class="table-responsive"&gt;
    &lt;table class="table table-bordered"&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th class="text-center"&gt;#&lt;/th&gt;
                &lt;th&gt;Name&lt;/th&gt;
                &lt;th&gt;Progress&lt;/th&gt;
                &lt;th&gt;Sales&lt;/th&gt;
                &lt;th class="text-center"&gt;Action&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;tr&gt;
                &lt;td class="text-center"&gt;1&lt;/td&gt;
                &lt;td&gt;John Doe&lt;/td&gt;
                &lt;td&gt;
                    &lt;div class="progress br-30"&gt;
                        &lt;div class="progress-bar br-30 bg-primary" role="progressbar" style="width: 29.56%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td&gt;&lt;p class="text-danger"&gt;29.56%&lt;/p&gt;&lt;/td&gt;
                &lt;td class="text-center"&gt;
                    &lt;ul class="table-controls"&gt;
                        &lt;li&gt;&lt;a href="javascript:void(0);"  data-toggle="tooltip" data-placement="top" title="Edit"&gt;&lt;svg&gt; ... &lt;/svg&gt;&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete"&gt;&lt;svg&gt; ... &lt;/svg&gt;&lt;/a&gt;&lt;/li&gt;
                    &lt;/ul&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td class="text-center"&gt;2&lt;/td&gt;
                &lt;td&gt;Andy King&lt;/td&gt;
                &lt;td&gt;
                    &lt;div class="progress br-30"&gt;
                        &lt;div class="progress-bar br-30 bg-warning" role="progressbar" style="width: 19.15%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td&gt;&lt;p class="text-danger"&gt;19.15%&lt;/p&gt;&lt;/td&gt;
                &lt;td class="text-center"&gt;
                    &lt;ul class="table-controls"&gt;
                        &lt;li&gt;&lt;a href="javascript:void(0);"  data-toggle="tooltip" data-placement="top" title="Edit"&gt;&lt;svg&gt; ... &lt;/svg&gt;&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete"&gt;&lt;svg&gt; ... &lt;/svg&gt;&lt;/a&gt;&lt;/li&gt;
                    &lt;/ul&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td class="text-center"&gt;3&lt;/td&gt;
                &lt;td&gt;Lisa Doe&lt;/td&gt;
                &lt;td&gt;
                    &lt;div class="progress br-30"&gt;
                        &lt;div class="progress-bar br-30 bg-success" role="progressbar" style="width: 39.00%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td&gt;&lt;p class="text-danger"&gt;39.00%&lt;/p&gt;&lt;/td&gt;
                &lt;td class="text-center"&gt;
                    &lt;ul class="table-controls"&gt;
                        &lt;li&gt;&lt;a href="javascript:void(0);"  data-toggle="tooltip" data-placement="top" title="Edit"&gt;&lt;svg&gt; ... &lt;/svg&gt;&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete"&gt;&lt;svg&gt; ... &lt;/svg&gt;&lt;/a&gt;&lt;/li&gt;
                    &lt;/ul&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td class="text-center"&gt;4&lt;/td&gt;
                &lt;td&gt;Vincent Carpenter&lt;/td&gt;
                &lt;td&gt;
                    &lt;div class="progress br-30"&gt;
                        &lt;div class="progress-bar br-30 bg-secondary" role="progressbar" style="width: 88.03%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td&gt;&lt;p class="text-success"&gt;88.03%&lt;/p&gt;&lt;/td&gt;
                &lt;td class="text-center"&gt;
                    &lt;ul class="table-controls"&gt;
                        &lt;li&gt;&lt;a href="javascript:void(0);"  data-toggle="tooltip" data-placement="top" title="Edit"&gt;&lt;svg&gt; ... &lt;/svg&gt;&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete"&gt;&lt;svg&gt; ... &lt;/svg&gt;&lt;/a&gt;&lt;/li&gt;
                    &lt;/ul&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;
    </pre>
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
