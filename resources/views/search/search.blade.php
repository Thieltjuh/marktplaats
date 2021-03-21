<div class="col-sm-6 col-9">
    <div class="d-flex justify-content-end">
        <div class="searchbar">
            <form action="/" id="my_form" method="POST">
                @csrf
                <input class="search_input" type="text" name="search" placeholder="Search...">
                <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" class="search_icon"><i class="fas fa-search"></i></a>
            </form>
        </div>
    </div>
</div>
