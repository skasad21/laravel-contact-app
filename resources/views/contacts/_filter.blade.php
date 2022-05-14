<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
      <div class="row">
        <div class="col">
          <select id="filter_company_id" name="company_id" class="custom-select">
            {{-- <option value="" selected>All Companies</option> --}}
            @if($companies->count())
            @foreach($companies as $id => $name)
            <option {{$id == request('company_id')?'selected':''}} value="{{$id}}">{{$name}}</option>
            @endforeach
            @endif
            
            {{-- <option value="1">Company One</option>
            <option value="2">Company Two</option>
            <option value="3">Company Three</option> --}}
          </select>
        </div>
        <div class="col">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fa fa-refresh"></i>
                  </button>
              <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>