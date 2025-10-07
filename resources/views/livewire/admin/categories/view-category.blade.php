@section('page-title')
    {{ __('View Category') }}
@endsection()

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-4">{{ $category->name }}</h4>
            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item">
                    <a href="#home1" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                        <span class="d-inline-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                        <span class="d-none d-sm-inline-block">Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile1" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <span class="d-inline-block d-sm-none"><i class="mdi mdi-account"></i></span>
                        <span class="d-none d-sm-inline-block">Recipes ({{ $category->recipes->count() }})</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="home1">
                    <div class="row">
                        <div class="col-lg-4 border">
                            <div class="m-3">
                                <p class="form-label">Name</p>
                            </div>
                        </div>
                        <div class="col-lg-8 border">
                            <div class="m-3">
                                {{ $category->name }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 border">
                            <div class="m-3">
                                <p class="form-label">Description</p>
                            </div>
                        </div>
                        <div class="col-lg-8 border">
                            <div class="m-3">
                                <p>{{ $category->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 border">
                            <div class="m-3">
                                <p class="form-label">Recipes</p>
                            </div>
                        </div>
                        <div class="col-lg-8 border">
                            <div class="m-3">
                                <p>{{ $category->recipes->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="profile1">
                    <div>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Owner</th>
                                    <th>Preparation Time</th>
                                    <th>Cook Time</th>
                                    <th>Level</th>
                                    <th>Servings</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category->recipes as $recipe)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $recipe->name }}</td>
                                        <td>{{ $recipe->category->name }}</td>
                                        <td>{{ $recipe->user->getFullName() }}</td>
                                        <td>{{ $recipe->prep_time }}</td>
                                        <td>{{ $recipe->cook_time }}</td>
                                        <td>{{ $recipe->difficulty }}</td>
                                        <td>{{ $recipe->servings }}</td>
                                        <td class="text-end">
                                            <a target="_blank" href="{{ route('recipes.view', $recipe->id) }}"
                                                class="btn btn-success btn-sm">View</a>
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
</div>