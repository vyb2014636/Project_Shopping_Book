<main>
  <div class="container" style="width: 30%">
    <form action="modules/Manage_Category/handle.php" method="POST">
      <div class="mb-3 d-flex">
        <label for="id-cate" class="form-label" style="width: 40%">
          Mã danh mục:</label>
        <input type="text" class="form-control" id="id-cate" name="id-cate" />
      </div>
      <div class="mb-3 d-flex">
        <label for="name-cate" class="form-label" style="width: 40%">Tên danh mục:</label>
        <input type="text" class="form-control" id="name-cate" name="name-cate" />
      </div>
      <div class="text-center">
        <input type="submit" class="btn btn-primary" name="add-cate" value="Thêm" />
        <a href="?page=category&query=listed" class="btn btn-primary">Xem danh sách</a>
      </div>
    </form>
  </div>
</main>