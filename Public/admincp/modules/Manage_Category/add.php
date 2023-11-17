<main>
  <div class="card-header d-flex align-items-center justify-content-center py-2" style="font-size: x-large;">
    <strong class="card-title mb-0">Thêm thể loại</strong>
  </div>
  <div class="container py-4" style="width: 40%">
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
        <input type="submit" class="btn" name="add-cate" style="background-color: #38284f;color: white;" value="Thêm" />
        <a href="?page=category&query=listed" class="btn " style="background-color: #38284f;color: white;">Xem danh sách</a>
      </div>
    </form>
  </div>
</main>