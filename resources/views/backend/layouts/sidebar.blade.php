 @php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
 @endphp


 <!-- Sidebar Menu -->
      <nav style="" class="mt-2">
        <ul style="" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      
      
          <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.view')}}" class="nav-link {{($route=='users.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p> 
                </a>
              </li>
            </ul>
          </li> 
          
       
          <!-- Roles -->
          <!-- Profile -->
          <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.password.view')}}" class="nav-link {{($route=='profiles.password.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p> 
                </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item has-treeview {{($prefix=='/brands')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Brand
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('brands.view-brand')}}" class="nav-link {{($route=='brands.view-brand')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Brand</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('brands.add-brand')}}" class="nav-link {{($route=='brands.add-brand')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Brand</p> 
                </a>
              </li>
            </ul>
          </li> 

    <li class="nav-item has-treeview {{($prefix=='/catagories')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('catagories.view-catagory')}}" class="nav-link {{($route=='catagories.view-catagory')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('catagories.add-catagory')}}" class="nav-link {{($route=='catagories.add-catagory')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p> 
                </a>
              </li>
            </ul>
          </li> 

           <li class="nav-item has-treeview {{($prefix=='/subcatagories')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Sub Catagory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('subcatagories.view-subcatagory')}}" class="nav-link {{($route=='subcatagories.view-subcatagory')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Sub Catagory</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('subcatagories.add-subcatagory')}}" class="nav-link {{($route=='subcatagories.add-subcatagory')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sub Catagory</p> 
                </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item has-treeview {{($prefix=='/subsubcatagories')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Sub Sub Catagory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('subsubcatagories.view-subsubcatagory')}}" class="nav-link {{($route=='subsubcatagories.view-subsubcatagory')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Sub Sub Catagory</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('subsubcatagories.add-subsubcatagory')}}" class="nav-link {{($route=='subsubcatagories.add-subsubcatagory')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sub Sub Catagory</p> 
                </a>
              </li>
            </ul>
          </li> 

           <li class="nav-item has-treeview {{($prefix=='/products')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.view-product')}}" class="nav-link {{($route=='products.view-product')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Product</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.add-product')}}" class="nav-link {{($route=='products.add-product')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p> 
                </a>
              </li>
            </ul>
          </li>
        <li class="nav-item has-treeview {{($prefix=='/sliders')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sliders.view-slider')}}" class="nav-link {{($route=='sliders.view-slider')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Slider</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sliders.add-slider')}}" class="nav-link {{($route=='sliders.add-slider')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Slider</p> 
                </a>
              </li>
            </ul>
          </li>  

           <li class="nav-item has-treeview {{($prefix=='/posts')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('catagory.view')}}" class="nav-link {{($route=='catagory.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Slider</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('catagory.add')}}" class="nav-link {{($route=='catagory.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Slider</p> 
                </a>
              </li>
            </ul>
          </li>  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      