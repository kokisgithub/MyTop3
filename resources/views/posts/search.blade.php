<form method="get" action="{{ url('/') }}" class="form-inline mt-5 mb-5">
    {{ csrf_field() }}
      <div class="form-group">
        <input type="text" name="keyword" placeholder="Seach..." class="form-control">
      </div>
        <input type="submit" value="検索" class="btn btn-secondary">
</form>