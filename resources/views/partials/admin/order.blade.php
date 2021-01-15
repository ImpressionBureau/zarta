<div role="group">
    <form action="{{ route($route, $item) }}" method="post">
        @csrf
        <div class="btn-group">
            <button class="btn btn-light px-2" name="order" value="moveOrderUp">&uparrow;</button>
            <button class="btn btn-light px-2" name="order" value="moveOrderDown">&downarrow;</button>
        </div>
    </form>
</div>
