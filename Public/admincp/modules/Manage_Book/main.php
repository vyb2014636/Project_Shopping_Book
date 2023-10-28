<main>
  <div class="container" style="width: 30%">
    <form action="modules/Manage_Book/handle.php" method="post">
      <div class="mb-3 d-flex">
        <label for="name-book" class="form-label" style="width: 40%">
          Mã Sách:</label>
        <input type="email" class="form-control" id="name-book" name="name-book" aria-describedby="emailHelp" />
      </div>
      <div class="mb-3 d-flex">
        <label for="id-book" class="form-label" style="width: 40%">Tên sách:</label>
        <input type="password" class="form-control" id="id-book" name="id-book" />
      </div>
      <div class="mb-3 d-flex">
        <label for="id-author" class="form-label" style="width: 40%">Tên tác giả:</label>
        <input type="password" class="form-control" id="id-author" name="id-author" />
      </div>
      <div class="mb-3 d-flex">
        <label for="id-cate" class="form-label" style="width: 40%">Mã danh mục:</label>
        <input type="password" class="form-control" id="id-cate" name="id-cate" />
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary" name="add-book">
          Thêm
        </button>
      </div>
    </form>
  </div>
</main>