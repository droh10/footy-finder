
<div class="row justify-content-end mt-4">
    <div class="col-sm-12 col-md-4">
        <form action="{{$url}}" method="GET" id="search-bar-frm">
        <div class="input-group">
            <input name="search_bar" type="text" class="form-control" placeholder="Search schedules" value="{{request()->search_bar ?? ''}}">
            <div class="input-group-append">
                <button class="btn btn-success search-submit" onclick="searchBar()" type="button"><i class="bi bi-search"></i></button>
            </div>
        </div>
        </form>
    </div>
</div>