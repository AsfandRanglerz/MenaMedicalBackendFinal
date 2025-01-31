@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('navBar') }}">Back</a>
                <form id="add_header_content_two" action="{{ route('navBarStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Add Navbar</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <input type="text" placeholder="Enter Text Content" name="text"
                                                id="text" value="{{ old('text') }}" class="form-control">
                                            @error('text')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>URL</label>
                                            <input type="url" placeholder="Enter URL" name="url"
                                                id="url" value="{{ old('url') }}" class="form-control">
                                            @error('url')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-0 px-4">
                                    {{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Route Name</label>
                                            <input type="route_name" placeholder="Enter Route Name" name="route_name"
                                                id="route_name" value="{{ old('route_name') }}" class="form-control">
                                            @error('route_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label for="is_dropdown">Is Dropdown</label>
                                            <select name="is_dropdown" id="is_dropdown" class="form-control">
                                                <option disabled selected>Select value</option>
                                                <option value="yes" {{ old('is_dropdown') == 'yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="no" {{ old('is_dropdown') == 'no' ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('is_dropdown')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                    
                                    <!-- Hidden input field container (Initially hidden) -->
                                <div class="row mx-0 px-4">
                                    <!-- Hidden input field container (Initially hidden) -->
                                <div id="dynamic-input-container" class="form-group mb-2" style="display: none;">
                                    <label for="dynamic_input">Enter Value</label>
                                    <div id="input-group">
                                        
                                        <div class="input-group mb-2">
                                            <input type="text" name="dynamic_input[]" id="dynamic_input" class="form-control" placeholder="Enter value">
                                            <button type="button" class="btn btn-success add-input">+</button>
                                        </div>
                                    </div>
                                       
                                </div>
                                    
                                </div>

                                <div class="card-footer text-center">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success mr-1 btn-bg"
                                            id="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@section('js')
@yield('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the dropdown and dynamic input container
            const dropdown = document.getElementById('is_dropdown');
            const dynamicInputContainer = document.getElementById('dynamic-input-container');
            const inputGroup = document.getElementById('input-group');

            // Show or hide the dynamic input fields based on the dropdown selection
            dropdown.addEventListener('change', function () {
                if (dropdown.value === 'yes') {
                    dynamicInputContainer.style.display = 'block';
                } else {
                    dynamicInputContainer.style.display = 'none';
                    // Clear all input fields and cloned fields when hidden
                    inputGroup.innerHTML = '';
                }
            });

            // Add new input field when the "Plus" button is clicked
            inputGroup.addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('add-input')) {
                    const newInputGroup = e.target.closest('.input-group').cloneNode(true);
                    const removeButton = document.createElement('button');
                    removeButton.type = 'button';
                    removeButton.classList.add('btn', 'btn-danger');
                    removeButton.innerHTML = '<i class="fas fa-minus"></i>';

                    // Replace the "Plus" button with "Minus" button
                    const plusButton = newInputGroup.querySelector('.add-input');
                    plusButton.replaceWith(removeButton);

                    // Append the new input group to the container
                    inputGroup.appendChild(newInputGroup);
                }
            });

            // Remove the cloned input field when the "Remove" button is clicked
            inputGroup.addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('btn-danger')) {
                    const inputGroupToRemove = e.target.closest('.input-group');
                    inputGroupToRemove.remove();
                }
            });
        });
    </script>
@endsection


